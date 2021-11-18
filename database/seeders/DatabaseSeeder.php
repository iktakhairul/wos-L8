<?php

namespace Database\Seeders;

use App\Models\Profile\JobPost\JobPost;
use App\Models\Profile\JobPost\ServiceCategory;
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
            'user_id'           => $user->id,
            'full_name'         => $user->name,
            'present_address'   => '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh',
            'present_latitude'  => '23.7942306',
            'present_longitude' => '90.4044471',
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
            'present_address'   => '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh',
            'present_latitude'  => '23.7942306',
            'present_longitude' => '90.4044471',
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
            'description'         =>
                '<p>I had two flat in khilkhet, one of them had a problem with kitchen light, i need to repair them and want two people.</p>

<ul>
	<li>Service line from bedroom.</li>
	<li>Line from main cutout.</li>
</ul>

<p>Do not apply if you don&#39;t have enougt working experiences.</p>',
            'latitude'            => '23.826247253616998',
            'longitude'           => '90.41602969999998',
            'city'                => 'Dhaka District',
            'country'             => 'Bangladesh',
            'address'             => '143/E Jamtola Rd, Dhaka, Bangladesh',
            'start_datetime'      => '2021-11-18 22:56:00',
            'end_datetime'        => '2021-11-19 22:56:00',
            'required_persons'    => 02,
            'budget'              => 650,
            'tags'                => 'electrician,service line,repair electric line,electric line mechanic,dhaka',
            'status'              => 'active',
        ]);
    }
}
