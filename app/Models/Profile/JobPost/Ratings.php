<?php

namespace App\Models\Profile\JobPost;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $fillable = [
        'job_timeline_id',
        'job_post_user_id',
        'job_worker_user_id',
        'type',
        'comments',
        'ratings',
    ];

    public function job_post()
    {
        return $this->belongsTo(JobPost::class);
    }
}
