<?php

namespace App\Console\Commands;

use App\Models\MCADocuments;
use Illuminate\Console\Command;
use Webklex\IMAP\Facades\Client;
use App\Jobs\UploadFileForMCAAndCreateReportJob;
use App\Models\MCAScannedEmails;


class MCAReportFromEmailDocCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Create:mcareportfromemaildoc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download pdf files from email and create report for MCA';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (config('services.mca_email_fetch.enable') == 'OFF') {
            return;
        }
        // Connect to the default account
        $client = Client::account('default');

        $client->connect();

        // Get the inbox
        $folder = $client->getFolder('INBOX');

        // Fetch recent unseen messages
        $messages = $folder->messages()->unseen()->limit(10)->get();

        // dd(count($messages));
        foreach ($messages as $message) {

            if (str_contains($message->getSubject(), 'Fwd:')) {
                $messageId = $message->getMessageId();
                $isFileExists = MCADocuments::where('email_id', $messageId)->exists();
                if ($isFileExists) {
                    continue;
                }

                $batchId = uniqid('batch_', true);
                $pdfAttachments = [];
                foreach ($message->getAttachments() as $attachment) {

                    if (strtolower(pathinfo($attachment->name, PATHINFO_EXTENSION)) === 'pdf') {
                        // Save attachment to storage
                        $attachment->save(storage_path('app/email_attachments/'));

                        MCADocuments::create([
                            'name' => $attachment->name,
                            'email_id' => $messageId,
                            'batch_id' => $batchId,
                        ]);
                        $pdfAttachments[] = $attachment->name;
                    }
                }
                if (!empty($pdfAttachments)) {
                    $subject = $message->getSubject();
                    $body = $message->getTextBody();
                    $sender = $message->getFrom()[0]->mail;

                    // Save email details to the database
                    MCAScannedEmails::create([
                        'email_id' => $messageId,
                        'subject' => $subject,
                        'body' => $body,
                        'batch_id' => $batchId,
                        'sender' => $sender,
                        'attachments_count' => count($pdfAttachments),
                        'report_status' => 'pending',
                    ]);
                    UploadFileForMCAAndCreateReportJob::dispatch($batchId);
                }
            }
            $message->setFlag('Seen');
        }
    }
}
