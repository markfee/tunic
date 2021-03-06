<?php

namespace App\Console\Commands;

use App\Tunic\Models\Folders;
use Illuminate\Console\Command;

class add_folder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tunic:add_folder {name} {path} {max_x=null} {max_y=null}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add a folder to the tunic database';

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
        $name   = $this->argument("name");
        $path   = $this->argument("path");
        $max_x  = $this->argument("max_x");
        $max_y  = $this->argument("max_y");

        Folders::create(
            [
                "name"  =>  $name,
                "path"  =>  $path,
                "max_x" =>  $max_x,
                "max_y" =>  $max_y,
            ]
        );
    }
}
