<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'status' => 1,
            'password' => bcrypt($pass),
        ]);

        User::create([
            'name' => 'Mehedi Hasan',
            'email' => 'mehedi@gmail.com',
            'contact_number' => '123-234-452',
            'type' => 'user',
            'status' => 1,
            'password' => bcrypt($pass),
        ]);
    }
}
