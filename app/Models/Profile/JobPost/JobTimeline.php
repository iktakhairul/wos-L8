<?php

namespace App\Models\Profile\JobPost;

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
}