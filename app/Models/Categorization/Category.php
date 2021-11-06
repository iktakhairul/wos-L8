<?php

namespace App\Models\Categorization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorization\Group;
use App\Models\Categorization\Subcategory;

class Category extends Model
{
    use HasFactory;

    protected $connection = 'categories';
    protected $table = 'categories';

    protected $fillable = ['group_id','name','slug','idon','subcategory_code','short_details','serial_no','status'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
