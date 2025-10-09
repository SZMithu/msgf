<?php

namespace App\Jobs;

use Dompdf\Options;
use App\Mail\MCAReportMail;
use Illuminate\Bus\Queueable;
use App\Models\MCAFileForAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class MCASendReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $batchId) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mca_file = MCAFileForAdmin::where('batch_id', $this->batchId)->first();

        if (!$mca_file) {
            return;
        }

        $text = $mca_file->final_decision_summary;

        $html = $mca_file->report->response;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Save PDF temporarily
        $pdfPath = storage_path("app/temp/mca_report_{$mca_file->id}.pdf");
        file_put_contents($pdfPath, $dompdf->output());

        // Assuming you have a method to send the report
        $this->sendReport($pdfPath, $text);
    }
    private function sendReport($pdfPath, $report)
    {
        $email = env('EMAIL_FOR_MCA_REPORT');
        Mail::to($email)->send(new MCAReportMail($pdfPath, $report));
        unlink($pdfPath);
    }
}
