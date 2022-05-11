<?php

namespace Database\Seeders;

use App\Models\JobPost\JobPost;
use App\Models\JobPost\ServiceCategory;
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
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'contact_number' => '123-234-453',
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
            'user_id'           => $user->id,
            'full_name'         => $user->name,
            'present_address'   => '4/A, Lane 5, NY, USA',
            'present_country'   => 'USA',
            'present_latitude'  => '123.7942306',
            'present_longitude' => '12.4044471',
        ]);

        $user = User::create([
            'name' => 'Asst. System Admin',
            'email' => 'asst.superadmin@gmail.com',
            'contact_number' => '123-234-453',
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
            'present_address'   => '4/A, Lane 5, NY, USA',
            'present_country'   => 'USA',
            'present_latitude'  => '123.7942306',
            'present_longitude' => '12.4044471',
        ]);

        ServiceCategory::create([
            'name'         => 'Electrician',
            'slug'         => 'Electrician-563-ED',
            'service_code' => 'ESC-7869',
            'status'       => 1,
        ]);

        ServiceCategory::create([
            'name'         => 'Plumber',
            'slug'         => 'Plumber-243-PL',
            'service_code' => 'ESC-5612',
            'status'       => 1,
        ]);

        ServiceCategory::create([
            'name'         => 'Mechanic',
            'slug'         => 'Mechanic-894-ME',
            'service_code' => 'MEC-6534',
            'status'       => 1,
        ]);

        JobPost::create([
            'service_category_id' => 1,
            'user_id'             => 1,
            'title'               => 'Service Electric Line Repair',
            'type'                => 'local',
            'description'         =>
                '<p>I had two flat in ny, one of them had a problem with kitchen light, i need to repair them and want two people.</p>
                    <ul>
	                <li>Service line from bedroom.</li>
	                <li>Line from main cutout.</li>
                    </ul>
                <p>Do not apply if you don&#39;t have enought working experiences.</p>',
            'latitude'            => '123.826247253616998',
            'longitude'           => '12.41602969999998',
            'city'                => 'NY',
            'country'             => 'USA',
            'address'             => '4/A, Lane 5, NY, USA',
            'start_datetime'      => '2021-11-18 22:56:00',
            'end_datetime'        => '2021-11-19 22:56:00',
            'required_persons'    => 02,
            'budget'              => 650,
            'tags'                => 'electrician,service line,repair electric line,electric line mechanic,dhaka',
            'status'              => 'active',
        ]);
    }
}
