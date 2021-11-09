<?php

namespace App\Models\Profile;

use App\Models\Location\District;
use App\Models\Location\Division;
use App\Models\Location\Thana;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'full_name', 'father_name', 'mother_name', 'spouse_name', 'dob', 'gender', 'religion', 'present_division_id', 'present_district_id', 'present_thana_id', 'present_postal_code', 'present_address', 'permanent_division_id', 'permanent_district_id', 'permanent_thana_id', 'permanent_postal_code', 'permanent_address', 'profile_score', 'referral_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function present_division()
    {
        return $this->belongsTo(Division::class, 'present_division_id')->select('id','name');
    }

    public function present_district()
    {
        return $this->belongsTo(District::class, 'present_district_id')->select('id','name');
    }

    public function present_thana()
    {
        return $this->belongsTo(Thana::class, 'present_thana_id')->select('id','name');
    }
}
