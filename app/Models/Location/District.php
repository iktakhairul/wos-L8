<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $connection = 'locations';
    //protected $connection = env('APP_ENV') == 'production' ? 'live_locations' : 'locations';
    protected $table = 'districts';
}
