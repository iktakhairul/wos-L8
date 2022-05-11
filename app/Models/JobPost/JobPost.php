<?php

namespace App\Models\JobPost;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Location\Division;
use App\Models\Location\District;
use App\Models\Location\Thana;

class JobPost extends Model
{
    protected $fillable = [
        'service_category_id',
        'user_id',
        'title',
        'description',
        'division_id',
        'district_id',
        'thana_id',
        'postal_code',
        'address',
        'map_location',
        'approval_datetime',
        'start_datetime',
        'end_datetime',
        'required_persons',
        'budget',
        'tags',
        'ratings',
        'status',
    ];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
    public function job_responses()
    {
        return $this->hasMany(JobResponses::class);
    }

    public function job_timeline()
    {
        return $this->hasMany(JobTimeline::class);
    }

    public function user_ratings()
    {
        return $this->hasMany(Ratings::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class)->select('id','name');
    }

    public function district()
    {
        return $this->belongsTo(District::class)->select('id','name');
    }

    public function thana()
    {
        return $this->belongsTo(Thana::class)->select('id','name');
    }
}
