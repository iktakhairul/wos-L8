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
            'domains' => 'system,developer,admin,dashboard,operator,support,merchant',
            'type' => 'dashboard',
            'role' => 'system',
            'weight' => 99.99,
            'permissions' => 'all',
            'status' => 'active',
            'password' => bcrypt($pass),
        ]);

        $user->profile = Profile::create([
            'user_id' => $user->id,
            'full_name' => $user->name
        ]);

        $user = User::create([
            'name' => 'Asst. System Admin',
            'email' => 'asst.system.admin@mailinator.com',
            'domains' => 'system,developer,admin,dashboard,operator,support,merchant',
            'type' => 'dashboard',
            'role' => 'system',
            'weight' => 99.99,
            'permissions' => 'all',
            'status' => 'active',
            'password' => bcrypt($pass),
        ]);

        $user->profile = Profile::create([
            'user_id' => $user->id,
            'full_name' => $user->name
        ]);
    }
}
