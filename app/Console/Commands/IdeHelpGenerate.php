<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class IdeHelpGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide:help';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the ide-helper commands to generate fresh stubs';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->warn('Helping phpstorm...');

        Artisan::call('ide-helper:generate');
        Artisan::call('ide-helper:models --nowrite');
        Artisan::call('ide-helper:meta');
    }
}
