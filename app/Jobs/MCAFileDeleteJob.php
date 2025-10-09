<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class MCAFileDeleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $OPENAI_API_KEY;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $files, public $vs_files, public $file)
    {
        $this->OPENAI_API_KEY = config('services.openai.mca_key');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (count($this->files) > 0) {
            foreach ($this->files as $file) {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $this->OPENAI_API_KEY,
                ])->delete("https://api.openai.com/v1/files/$file");
                $response = $response->json();
                if (array_key_exists('deleted', $response) && $response['deleted'] == true) {
                    $this->files = array_filter($this->files, function ($item) use ($file) {
                        return $item !== $file;
                    });
                }
            }
        }
        // dd($this->vs_files);
        if (count($this->vs_files ?? []) > 0) {
            foreach ($this->vs_files as $file) {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $this->OPENAI_API_KEY,
                ])->delete("https://api.openai.com/v1/vector_stores/$file");
                $response = $response->json();
                if (array_key_exists('deleted', $response) && $response['deleted'] == true) {
                    $this->vs_files = array_filter($this->vs_files, function ($item) use ($file) {
                        return $item !== $file;
                    });
                }
            }
        }
        $this->file->update([
            'file_id' => json_encode($this->files),
            'vs_file_id' => json_encode($this->vs_files),
        ]);
    }
}
