<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\MultiImage;
use Image;

class ProductsController extends Controller
{
    public function AllProducts(){
        $products = Products::latest()->get();
        return view('admin.products.index',compact('products'));
    }

    public function AddProducts(){
        $brands = Brands::orderBy('brand_name','ASC')->get();
        $categories = Categories::orderBy('category_name','ASC')->get();
        
        return view('admin.products.add',compact('brands'),compact('categories'));
    }
}
