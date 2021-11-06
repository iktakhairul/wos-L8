<?php

namespace App\Models\Categorization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorization\Category;
use App\Models\Categorization\Subcategory;

class Group extends Model
{
    use HasFactory;

    protected $connection = 'categories';
    protected $table = 'groups';

    protected $fillable = ['name','slug','idon','subcategory_code','short_details','serial_no','status'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
