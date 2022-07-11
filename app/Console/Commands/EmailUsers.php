<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmailDigest;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Console\Command;
use App\Notifications\AdminNewUserNotification;
use Illuminate\Support\Facades\Mail;

class EmailUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user about reminders';

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
        $reminders = Peminjaman::query()
                    // ->where('id_status', 7 )  
                    ->where('reminder_at', now()->format('Y-m-d'))            
                    ->get();
        $data = [];

        foreach ($reminders as $reminder) {
            $data[$reminder->id_peminjam][] = $reminder->toArray();
        }
            // dd($data);
        foreach ($data as $userId => $reminders) {
            $this->sendEmailToUser($userId, $reminders);
        }
    }

    private function sendEmailToUser($userId, $reminders){
        $user = User::find($userId);

        Mail::to($user)->send(new ReminderEmailDigest($reminders));
    }
}
