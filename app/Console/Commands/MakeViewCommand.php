<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new blade template';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $view = $this->argument('view');

        $path = $this->viewpath($view);

        $this->createDir($path);

        if(File::exists($path)){
            $this->error('file '.$path.' already exists.');
        }

        File::put($path,$path);
        $this->info('File '.$path.' created.');

        return true;
    }

    public function viewpath($view){
        $view = str_replace('.','/',$view).'.blade.php';

        $path = 'resources/views/'.$view;

        return $path;
    }

    public function createDir($path){
        $dir= dirname($path);

        if(! file_exists($dir)){
            mkdir($dir, 0777, true);
        }
    }
}
