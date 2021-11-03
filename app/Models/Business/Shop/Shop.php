<?php

namespace App\Models\Business\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Business\Business;
use App\Models\Location\Division;
use App\Models\Location\District;
use App\Models\Location\Thana;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','business_id','type','shop_contact_numbers','shop_email','division_id','district_id','thana_id','postal_code','address','shop_code','map_location','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }
}