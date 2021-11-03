<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','business_name','slug','type','owner_type','business_code','business_contact_no','business_email','division_id','district_id','thana_id','postal_code','address','ranking_score','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
