<?php

namespace App\Models\Profile\JobPost;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JobResponses extends Model
{
    protected $fillable = [
        'service_category_id',
        'job_post_id',
        'user_id',
        'description',
        'demanded_budget',
        'status',
    ];

    public function job_post()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
