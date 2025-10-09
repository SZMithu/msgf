<?php

namespace App\Http\Controllers\Apps\Mca;

use App\Models\MCADocuments;
use Illuminate\Http\Request;
use App\Models\MCAFileForAdmin;
use App\Models\MCAScannedEmails;
use Webklex\IMAP\Facades\Client;
use App\Http\Controllers\Controller;
use App\DataTables\MCAScannedEmailsDataTable;
use App\Jobs\UploadFileForMCAAndCreateReportJob;

class MCAFetchDocFromEmailController extends Controller
{
    /**
     * Display the MCA Report Scanned Emails list.
     *
     * @return \Illuminate\View\View
     */

    public function index(MCAScannedEmailsDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.mca-management.scanned-emails.list');
    }

    /**
     * Re-scan the email and its attachments.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function reScanEmail(Request $request)
    {
        $id = $request->input('id');
        $data = MCAScannedEmails::findOrFail($id);
        $mca_file = MCAFileForAdmin::where('batch_id', $data->batch_id)->first();
        if ($mca_file) {
            if ($mca_file->report()->exists()) {
                $mca_file->report()->delete();
            }
            $mca_file->delete();
        }

        $emailId = $data->email_id;
        if (strpos($emailId, '<') !== 0) {
            $email_id = "<{$emailId}>";
        }

        $old_files = MCADocuments::where('email_id', $emailId)->get();
        foreach ($old_files as $file) {
            $file_path = storage_path('app/email_attachments/' . $file->name);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $file->delete();
        }

        $client = Client::account('default');
        $client->connect();

        // Directly query the inbox for the message
        $folder = $client->getFolder('INBOX');
        $messages = $folder->messages()->whereMessageId($email_id)->get();
        if ($messages->isNotEmpty()) {
            $message = $messages->first();
            $pdfAttachments = [];
            $batchId = uniqid('batch_', true);
            foreach ($message->getAttachments() as $attachment) {
                if (strtolower(pathinfo($attachment->name, PATHINFO_EXTENSION)) === 'pdf') {
                    // Save attachment to storage
                    $attachment->save(storage_path('app/email_attachments/'));
                    MCADocuments::create([
                        'name' => $attachment->name,
                        'email_id' => $emailId,
                        'batch_id' => $batchId,
                    ]);
                    $pdfAttachments[] = $attachment->name;
                }
            }
            $subject = $message->getSubject();
            $body = $message->getTextBody();
            $sender = $message->getFrom()[0]->mail;

            // Save email details to the database
            $data->subject = $subject;
            $data->body = $body;
            $data->batch_id = $batchId;
            $data->sender = $sender;
            $data->attachments_count = count($pdfAttachments);
            $data->report_status = 'Re-scanning';
            $data->save();

            // Dispatch the job to upload files and create report
            UploadFileForMCAAndCreateReportJob::dispatch($batchId);

            return response()->json(['status' => 'success', 'message' => 'Email re-scanned successfully.']);
        }
    }
    /**
     * Fetch/Download attachments from an email.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function fetchAttachments()
    {
        // Connect to the default account
        $client = Client::account('default');
        $client->connect();

        // Get the inbox
        $folder = $client->getFolder('INBOX');

        // Fetch recent unseen messages
        $messages = $folder->messages()->unseen()->limit(10)->get();

        foreach ($messages as $message) {

            if (str_contains($message->getSubject(), 'Fwd:')) {
                $messageId = $message->getMessageId();

                $isFileExists = MCADocuments::where('email_id', $messageId)->exists();
                if ($isFileExists) {
                    continue;
                }

                $batchId = uniqid('batch_', true);

                foreach ($message->getAttachments() as $attachment) {

                    // Save attachment to storage
                    $attachment->save(storage_path('app/email_attachments/'));

                    MCADocuments::create([
                        'name' => $attachment->name,
                        'email_id' => $messageId,
                        'batch_id' => $batchId,
                    ]);
                }
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
                    'attachments_count' => count($message->getAttachments()),
                    'report_status' => 'pending',
                ]);
                UploadFileForMCAAndCreateReportJob::dispatch($batchId);
            }
            $message->setFlag('Seen');
            // $message->delete();
        }
    }
    /**
     * Delete an email.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function deleteEmail(Request $request)
    {
        $id = $request->input('id');
        $data = MCAScannedEmails::findOrFail($id);

        // $mca_file = MCAFileForAdmin::where('batch_id', $data->batch_id)->first();
        // if ($mca_file) {
        //     if ($mca_file->report()->exists()) {
        //         $mca_file->report()->delete();
        //     }
        //     $mca_file->delete();
        // }

        $emailId = $data->email_id;

        // $old_files = MCADocuments::where('email_id', $emailId)->get();
        // foreach ($old_files as $file) {
        //     $file_path = storage_path('app/email_attachments/' . $file->name);
        //     if (file_exists($file_path)) {
        //         unlink($file_path);
        //     }
        //     $file->delete();
        // }
        if (strpos($emailId, '<') !== 0) {
            $email_id = "<{$emailId}>";
        }
        $client = Client::account('default');
        $client->connect();

        // Directly query the inbox for the message
        $folder = $client->getFolder('INBOX');
        $messages = $folder->messages()->whereMessageId($email_id)->get();
        // dd($messages);
        if ($messages->isNotEmpty()) {
            $message = $messages->first();
            $message->delete();
        }
        // Delete the email record
        $data->delete();

        return response()->json(['status' => 'success', 'message' => 'Email deleted successfully.']);
    }
    /**
     * View the file associated with the scanned email.
     * @param string $batchId
     * @return \Illuminate\View\View
     */
    public function viewFile($batchId)
    {
        $file = MCAFileForAdmin::where('batch_id', $batchId)->first();
        dd($file);
    }
}
