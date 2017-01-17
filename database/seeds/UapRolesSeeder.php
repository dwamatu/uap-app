<?php

use Illuminate\Database\Seeder;

class UapRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            [
                'name' => 'View Dashboard',
                'slug' => 'can.view.dashboard',
                'description' => 'Can View Dashboard'
            ],

            [
                'name' => 'View Farmers',
                'slug' => 'can.view.farmers',
                'description' => 'Can View Farmers'
            ],

            [
                'name' => 'View Claims',
                'slug' => 'can.view.claims',
                'description' => 'Can View Claims'
            ],

            [
                'name' => ' View Reported',
                'slug' => 'can.view.reported',
                'description' => 'Can View Reported'
            ],

            [
                'name' => ' View  Confirmed',
                'slug' => 'can.view.confirmed',
                'description' => 'Can View Confirmed'
            ],

            [
                'name' => ' View Reports',
                'slug' => 'can.view.reports',
                'description' => 'Can View Reports'
            ],

            [
                'name' => ' View Administration',
                'slug' => 'can.view.administration',
                'description' => 'Can View Administration'
            ],

            [
                'name' => ' View Inspectors',
                'slug' => 'can.view.inspectors',
                'description' => 'Can View Inspectors'
            ],

            [
                'name' => 'Export Farmers',
                'slug' => 'can.export.farmers',
                'description' => 'Can Export Farmers'
            ],

            [
                'name' => 'Export Reported',
                'slug' => 'can.export.reported',
                'description' => 'Can Export Reported'
            ],

            [
                'name' => 'Export Confirmed',
                'slug' => 'can.export.confirmed',
                'description' => 'Can Export Confirmed'
            ],

            [
                'name' => 'Search Reports',
                'slug' => 'can.search.reports',
                'description' => 'Can Search Reports'
            ],

            [
                'name' => 'Export Inspectors',
                'slug' => 'can.export.inspectors',
                'description' => 'Can Export Inspectors'
            ],

            [
                'name' => 'Add Inspectors',
                'slug' => 'can.add.inspectors',
                'description' => 'Can Add Inspectors'
            ],
            [
                'name' => 'Update Inspectors',
                'slug' => 'can.update.inspectors',
                'description' => 'Can Update Inspectors'
            ],
            [
                'name' => 'Download Loss Claim',
                'slug' => 'can.download.las',
                'description' => 'Can Download Inspectors'
            ],
            [
            'name' => 'Confirm Loss Claim',
            'slug' => 'can.confirm.las',
            'description' => 'Can Confirm Inspectors'
            ]

        ];

        //insert permissions
        DB::table('permissions')->insert($permissions);
    }


}
