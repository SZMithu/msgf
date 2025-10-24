<?php

namespace App\Console\Commands;

use App\Jobs\MCAFileDeleteJob;
use App\Models\MCAFileForAdmin;
use Illuminate\Console\Command;

class DeleteOldFileFromAIserverCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oldfileFromAiServer:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete files older than 7 days from the AI server';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Fetch all files older than 7 days
        $filesToDelete = MCAFileForAdmin::where('created_at', '<', now()->subDays(7))->get();

        if ($filesToDelete->isEmpty()) {
            $this->info('No old files found to delete.');
            return;
        }

        foreach ($filesToDelete as $file) {
            $fileIds = json_decode($file->file_id, true) ?? [];
            $vsFileIds = json_decode($file->vs_file_id, true) ?? [];

            // Only dispatch job if there’s something to delete
            if (!empty($fileIds) || !empty($vsFileIds)) {
                MCAFileDeleteJob::dispatch($fileIds, $vsFileIds, $file);
            }
        }

        $this->info('Old file deletion jobs dispatched successfully.');
    }
}
