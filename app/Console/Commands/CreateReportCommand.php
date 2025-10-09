<?php

namespace App\Console\Commands;

use App\Models\MCADocuments;
use Illuminate\Console\Command;
use Webklex\IMAP\Facades\Client;
use App\Jobs\UploadFileForMCAAndCreateReportJob;
use App\Models\MCAFileForAdmin;
use App\Models\MCAReportForAdmin;
use App\Models\MCAScannedEmails;


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

            UploadFileForMCAAndCreateReportJob::dispatch($document->batch_id);
        }
    }
}
