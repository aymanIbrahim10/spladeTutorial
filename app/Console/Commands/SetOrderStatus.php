<?php

namespace App\Console\Commands;

use App\Events\OrderStatusWasChange;
use App\Models\Order;
use Illuminate\Console\Command;

class SetOrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:status {status}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        Order::first()->forceFill([
            'status' => $this->argument('status'),
        ])->save();

        event(new OrderStatusWasChange);
    }
}
