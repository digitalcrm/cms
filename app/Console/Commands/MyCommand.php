<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my-command';
    
    public function handle()
    {
        ray()->clearScreen();
        // ray('hello world');
    }
}
