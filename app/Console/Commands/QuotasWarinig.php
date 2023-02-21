<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\WarningPostsMailable;
use Illuminate\Support\Facades\Mail;

class QuotasWarinig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'warning:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a message to report that the 90% posts quota has been reached';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Mail::to('recipient@example.com')->send(new WarningPostsMailable());
    }
}
