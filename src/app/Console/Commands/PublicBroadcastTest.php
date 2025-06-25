<?php

namespace App\Console\Commands;

use App\Events\TestBroadcast;
use Illuminate\Console\Command;

class PublicBroadcastTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:public-broadcast-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        event(new TestBroadcast());

        $this->info("Broadcast sent");
    }
}
