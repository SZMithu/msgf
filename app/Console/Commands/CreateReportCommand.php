<?php

namespace App\Console\Commands;

use App\Models\MCADocuments;
use App\Models\MCAFileForAdmin;
use Illuminate\Console\Command;
use App\Models\MCAScannedEmails;
use App\Models\MCAReportForAdmin;
use App\Jobs\UploadFileForMCAAndCreateReportJob;


class CreateReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Create:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create report for MCA';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $documents = MCAScannedEmails::where('report_status', 'pending')->get();
        foreach ($documents as $document) {
            if ($document->report()->exists()) {
                $document->report_status = 'completed';
                $document->save();
                continue;
            }

            $missing_report = MCAFileForAdmin::where('batch_id', $document->batch_id)->where('status', 'In Process')->first();
            if ($missing_report) {
                $missing_report->delete();
            }

            if($document->attachments_count == 0){
                $document->delete();
                continue;
            }
            UploadFileForMCAAndCreateReportJob::dispatch($document->batch_id);
        }
    }
}
