<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $pass = 789456123;
        $user = User::create([
            'name' => 'System Admin',
            'email' => 'system.admin@mailinator.com',
            'contact_number' => '01987654321',
            'domains' => 'system,developer,admin,dashboard,operator,support,merchant',
            'type' => 'system',
            'role' => 'system',
            'weight' => 99.99,
            'permissions' => 'all',
            'status' => 'active',
            'complete_profile_status' => 'complete',
            'password' => bcrypt($pass),
        ]);

        $user->profile = Profile::create([
            'user_id' => $user->id,
            'full_name' => $user->name,
            'present_division_id' => 1,
            'present_district_id' => 1,
            'present_thana_id' => 1,
            'present_postal_code' => 1205,
            'present_address' => '32/A, New Road, Tejgaon',
            'permanent_division_id' => 2,
            'permanent_district_id' => 2,
            'permanent_thana_id' => 2,
            'permanent_postal_code' => 1204,
            'permanent_address' => '36/F, Road 6, Banani',
        ]);

        $user = User::create([
            'name' => 'Asst. System Admin',
            'email' => 'asst.system.admin@mailinator.com',
            'contact_number' => '01987654320',
            'domains' => 'system,developer,admin,dashboard,operator,support,merchant',
            'type' => 'system',
            'role' => 'system',
            'weight' => 99.99,
            'permissions' => 'all',
            'status' => 'active',
            'complete_profile_status' => 'complete',
            'password' => bcrypt($pass),
        ]);

        $user->profile = Profile::create([
            'user_id' => $user->id,
            'full_name' => $user->name,
            'present_division_id' => 2,
            'present_district_id' => 2,
            'present_thana_id' => 2,
            'present_postal_code' => 1207,
            'present_address' => '56/C, Road 8, Sukrabad',
            'permanent_division_id' => 3,
            'permanent_district_id' => 3,
            'permanent_thana_id' => 3,
            'permanent_postal_code' => 1208,
            'permanent_address' => '56J, Road 9, Banani',
        ]);
    }
}
