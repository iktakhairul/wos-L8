<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Business\Shop\Shop;

class Business extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','business_name','slug','business_logo','type','owner_type','business_contact_numbers','business_email','business_code','ranking_score','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}