<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mailers\AppMailer;


class SendPasswordExpiryNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:passwordexpiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a notification that a passwords are about to expire';

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
    public function handle(AppMailer $mailer)
    {
        //Get the First Expiry Date
        $firstnotificationday = \Carbon\Carbon::now()->subDays(35)->toDateTimeString();
        //Get Users Whose Passwords are about to expire
        $users = User::where('active', true)
            ->where('password_updated_at', '<', $firstnotificationday)->get();

        //Send Emails To Users whose passwords are about to expire
        foreach ($users as $user) {
            $mailer->sendEmailPasswordExpiration($user);
        }

        $this->info('Your Password is about to expire email has been sent successfully!');
    }

}
