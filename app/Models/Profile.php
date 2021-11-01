<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'full_name', 'father_name', 'mother_name', 'spouse_name', 'dob', 'gender', 'religion', 'present_division_id', 'present_district_id', 'present_thana_id', 'present_postal_code', 'present_address', 'permanent_division_id', 'permanent_district_id', 'permanent_thana_id', 'permanent_postal_code', 'permanent_address', 'profile_score', 'referral_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
