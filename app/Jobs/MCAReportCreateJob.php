<?php

namespace App\Jobs;

use App\Models\MCADocuments;
use Illuminate\Bus\Queueable;
use App\Jobs\MCASendReportJob;
use App\Traits\McaReportTrait;
use App\Models\MCAFileForAdmin;
use App\Models\MCAScannedEmails;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class MCAReportCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use McaReportTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $timeout = 2400;
    private $batchId;
    private $api_key;
    public function __construct($batch_id)
    {
        $this->batchId = $batch_id;
        $this->api_key = config('services.openai.mca_key');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mca_file = MCAFileForAdmin::where('batch_id', $this->batchId)->first();

        $file_with_text = MCADocuments::where('batch_id', $this->batchId)->get();

        if (count($file_with_text) < 4) {
            $mca_file->status = 'Missing Files';
            $mca_file->save();
            MCAScannedEmails::where('batch_id', $this->batchId)->update(['report_status' => 'Missing Files']);
            return;
        }

        $file_text = '';
        foreach ($file_with_text as $file) {
            $file_text .= $file->file_text;
        }

        // $mca_file_authenticity = $this->getFileAuthenticity($file_text);

        // if ($mca_file_authenticity === 'Not Authentic') {
        //     $mca_file->status = 'Not Authentic';
        //     $mca_file->save();
        //     return;
        // }


        $mca_file->company = $this->getCompanyName($file_text);
        $mca_file->owner_name = $this->getOwnerFullName($file_text);
        $mca_file->business_info = $this->getBusinessInformation($file_text);

        $mca_file->business_type = $this->getBusinessType($file_text);

        $mca_file->owner_info = $this->getOwnerInformation($file_text);
        $mca_file->bs_summary = $this->getBankStatementSummary($file_text);
        $mca_file->od_summary = $this->overdraftSummary($file_text);

        $cr_analysis = $this->getCreditReportAnalysis($file_text);
        $mca_file->credit_score = $this->getOwnerCreditScore($cr_analysis);
        $mca_file->cr_analysis = $cr_analysis;

        $mca_file->rfad_check = $this->getRedFlagAutoDeclineCheck($file_text);
        $mca_file->ga_criteria = $this->getGeneralApprovalCriteria($file_text);
        $mca_file->mr_assessment = $this->MCALoanRiskAssessment($file_text);

        $mca_file->approval_risk = $this->getApprovalRisk($file_text);

        $affordability_calculation = $this->getLoanAffordabilityCalculation($file_text);
        $mca_file->affordability_calculation = $affordability_calculation;

        $dml_recommendation = $this->getDynamicMCALoanRecommendation($file_text);
        $mca_file->dml_recommendation = $dml_recommendation;


        $summary = $this->getFinalDecisionSummary($file_text);

        $text_for_approvel_check = $affordability_calculation . $dml_recommendation . ' final decision summary: ' . $summary;
        $mca_file->approved_amount = $this->getApprovalAmount($text_for_approvel_check);

        $status = $this->getStatusFromFinalDecisionSummary($summary);
        $mca_file->final_decision_summary = $summary;
        $mca_file->status = $status;
        $mca_file->file_info = $this->getFileReadabitilyStatus($file_with_text);
        $mca_file->save();
        $this->saveUpdatedReport($mca_file->id);
        MCAScannedEmails::where('batch_id', $this->batchId)->update(['report_status' => 'completed']);
        MCASendReportJob::dispatch($this->batchId)->delay(now()->addMinutes(2));

    }

    private function getFileReadabitilyStatus($file_with_text)
    {
        $table_row = '';
        foreach ($file_with_text as $file) {
            if (str_word_count($file->file_text) < 60) {
                $table_row .= '<tr><td>' . $file->name . '</td><td>Not Readable</td></tr>';
                continue;
            }
            $table_row .= '<tr><td>' . $file->name . '</td><td>Readable</td></tr>';
        }

        return '<div class="section">
                  <h2>Included Files</h2>
                   <table>
                    <tr><th>File Name</th><th>Status</th></tr>' . $table_row . '
                   </table>
               </div>';
    }
    private function getStatusFromFinalDecisionSummary($summary)
    {
        $dom = new \DOMDocument();

        // Suppress warnings due to invalid HTML structure
        @$dom->loadHTML($summary);

        $h1Tags = $dom->getElementsByTagName('h1');

        if ($h1Tags->length > 0) {
            $h1Text = trim($h1Tags->item(0)->textContent);
            return $h1Text;
        }

        return null;
    }
}
