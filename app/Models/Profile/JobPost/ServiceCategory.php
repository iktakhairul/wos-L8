<?php

namespace App\Models\Profile\JobPost;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ServiceCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'service_code',
        'status',
    ];

    public function job_post()
    {
        return $this->hasMany(JobPost::class);
    }
}
