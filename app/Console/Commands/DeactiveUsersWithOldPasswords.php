<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class DeactiveUsersWithOldPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deactivate:onpasswordexpiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate Users with Old Passwords';

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
        //Get the First Expiry Date
        $firstnotificationday = \Carbon\Carbon::now()->subDays(42)->toDateTimeString();
        //Get Users Whose Passwords have Expired

        $users = User::where('active', true)  ->where('password_updated_at', '<', $firstnotificationday)->get();

        //Send Deactivate Accounts where password have expired.
        foreach ($users as $user) {
            $user->update(['active'=>false]);
        }

        $this->info('Your Account had been Deactivated');
    }
}
