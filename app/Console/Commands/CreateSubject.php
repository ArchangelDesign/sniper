<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateSubject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subject:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add subject to the system';

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
     * @return int
     */
    public function handle()
    {

        return Command::SUCCESS;
    }
}
