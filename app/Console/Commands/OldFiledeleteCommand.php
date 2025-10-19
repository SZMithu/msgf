<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class OldFiledeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oldfile:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete files older than 7 days from the specified directory';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $directory = storage_path('app/email_attachments'); // directory to clean

        if (!File::exists($directory)) {
            $this->error("Directory does not exist: {$directory}");
            return Command::FAILURE;
        }

        $files = File::files($directory);
        $now = time();
        $deletedFilesCount = 0;

        foreach ($files as $file) {
            $lastModified = File::lastModified($file);

            // 7 days in seconds
            if ($now - $lastModified >= 7 * 24 * 60 * 60) {
                try {
                    File::delete($file);
                    $deletedFilesCount++;
                } catch (\Exception $e) {
                    $this->error("Failed to delete {$file}: {$e->getMessage()}");
                }
            }
        }

        $this->info("✅ Deleted {$deletedFilesCount} file(s) older than 7 days from {$directory}.");

        return Command::SUCCESS;
    }
}
