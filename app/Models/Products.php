<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function brands(){
        return $this->belongsTo(Brands::class,'brand_id','id');
    }

    public function categories(){
        return $this->belongsTo(Categories::class,'category_id','id');
    }

    public function subcategories(){
        return $this->belongsTo(SubCategories::class,'subcategory_id','id');
    }
}
