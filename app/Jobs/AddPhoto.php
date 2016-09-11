<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Tunic\Models\Photos;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddPhoto extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    private $path;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $filesystem = new Filesystem();
        print "Importing {$this->path} - " . $filesystem->mimeType($this->path) ."\n";
    }
}
