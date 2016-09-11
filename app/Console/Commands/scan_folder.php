<?php

namespace App\Console\Commands;

use App\Tunic\Models\Folders;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;

class scan_folder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tunic:scan_folder {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scan a folder for files to add to the tunic database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path   = trim($this->argument("path"));

        $folder = Folders::where("path", $path)->first();
        if (empty($folder)) {
            print "path not found in database - please call add_folder first\n";
        }

        $filesystem = new Filesystem();
        foreach($filesystem->allFiles($folder->path) as $file ) {
            print "{$file} - " . $filesystem->mimeType($file) ."\n";
        }
    }
}
