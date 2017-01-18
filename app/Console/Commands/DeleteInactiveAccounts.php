<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteInactiveAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactiveaccounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Inactive Accounts';

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
    public function handle()
    {
        //Get the 60 days from now
        $lastlogin = \Carbon\Carbon::now()->subDays(60)->toDateTimeString();
        //Get Users Whose Passwords are about to expire
        $users = User::where('active', false)
            ->where('last_login', '<', $lastlogin)->get();

        //Send Emails To Users whose passwords are about to expire
        foreach ($users as $user) {

            $user->update(['is_deleted'=>true]);
        }

    }
}
