<?php

namespace App\Models\Categorization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorization\Group;
use App\Models\Categorization\Category;

class Subcategory extends Model
{
    use HasFactory;

    protected $connection = 'categories';
    protected $table = 'subcategories';

    protected $fillable = ['group_id','category_id','name','slug','idon','subcategory_code','short_details','serial_no','status'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}