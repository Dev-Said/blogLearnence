<?php

namespace App\Console\Commands;

use App\Models\Quota;
use Illuminate\Console\Command;
use App\Mail\WarningQuotasPost;
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
        $quota = Quota::all();

        $users = $quota->filter(function($rec) {
            return $rec->limitQuotas();
        })->map(function($rec) {
            return $rec->user;
        });

  
        Mail::to($users)->send(new WarningQuotasPost());
    }
}
