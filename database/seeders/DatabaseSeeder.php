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
        $pass = 'password';
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'contact_number' => '123-234-453',
            'type' => 'system_admin',
            'status' => 'active',
            'password' => bcrypt($pass),
        ]);

        User::create([
            'name' => 'Asst. System Admin',
            'email' => 'asst.superadmin@gmail.com',
            'contact_number' => '123-234-452',
            'type' => 'system_admin',
            'status' => 'active',
            'password' => bcrypt($pass),
        ]);
    }
}
