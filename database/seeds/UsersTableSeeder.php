<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'firstname' => 'Derrick',
            'secondname' => 'Wamatu',
            'email' => 'dwamatu@gmail.com',
            'password' => bcrypt('test'),
            'password_updated_at' => Carbon::now()->subMonths(3),


        ]);
    }
}
