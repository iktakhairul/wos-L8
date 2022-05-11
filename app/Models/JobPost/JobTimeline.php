<?php

namespace App\Models\JobPost;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JobTimeline extends Model
{
    protected $fillable = [
        'job_post_id',
        'job_response_id',
        'comments',
        'ratings',
        'status',
    ];
    public function job_post()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function job_response()
    {
        return $this->belongsTo(JobResponses::class);
    }

    public function user_ratings()
    {
        return $this->hasMany(Ratings::class);
    }
}
