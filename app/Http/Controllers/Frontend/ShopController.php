<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\MultiImage;
use App\Models\User;
use App\Models\Faq;

class ShopController extends Controller
{

    public function Index(){

        $products = Products::where('product_status', 'active')->orderBy('id','DESC')->get();
        $categories = Categories::orderBy('category_name','ASC')->get();
        $brands = Brands::orderBy('brand_name','ASC')->get();
        $new_products = Products::orderBy('id','DESC')->limit(3)->get();
        

        return view('shop.products.index',compact('products','categories','brands','new_products'));

    }

    public function FaqPage(){

        $categories = Categories::orderBy('category_name','ASC')->get();
        $brands = Brands::orderBy('brand_name','ASC')->get();
        $faqs = Faq::orderBy('id','ASC')->get();

        return view('shop.faq',compact('categories','brands','faqs'));

    }

    public function PoliciesPage(){

        $categories = Categories::orderBy('category_name','ASC')->get();
        $brands = Brands::orderBy('brand_name','ASC')->get();

        return view('shop.policies',compact('categories','brands'));

    }

    public function ProductDetails($id,$slug){

        $product = Products::findOrFail($id);

        $size = $product->product_size;
        $product_size = explode(',',$size);

        $colors = $product->product_color;
        $product_color = explode(',',$colors);

        $tags = $product->product_tags;
        $product_tag = explode(',',$tags);

        $multiImages = MultiImage::where('product_id',$id)->get();

        $cat_id = $product->category_id;
        $relatedProduct = Products::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();

        return view('shop.products.details',compact('product','product_tag','product_size','product_color','multiImages','relatedProduct'));

    }


    public function CategoryDetails(Request $request,$id,$slug){

        $products = Products::where('product_status', 'active')->where('category_id',$id)->orderBy('id','DESC')->get();
        $categories = Categories::orderBy('category_name','ASC')->get();
        $breadcrumbs = Categories::where('id',$id)->first();
        $brands = Brands::orderBy('brand_name','ASC')->get();
        $new_products = Products::orderBy('id','DESC')->limit(3)->get();

        return view('shop.products.categories',compact('products','categories','brands','breadcrumbs','new_products'));

    }

    public function BrandDetails(Request $request,$id,$slug){

        $products = Products::where('product_status', 'active')->where('brand_id',$id)->orderBy('id','DESC')->get();
        $brands = Brands::orderBy('brand_name','ASC')->get();
        $breadcrumbs = Brands::where('id',$id)->first();
        $new_products = Products::orderBy('id','DESC')->limit(3)->get();

        return view('shop.products.brands',compact('products','brands','breadcrumbs','new_products'));

    }

    public function ProductModalAjax($id){

        $product = Products::with('categories','brands')->findOrFail($id);

        return response::json(array(

            'product' => $product,
            'size' => $product_size,
            'colors' => $product_color,

        ));
    }

    public function Search(Request $request){

        $request->validate(['search' => "required"]);

        $item = $request->search;
        $products = Products::where('product_name','LIKE',"%$item%")->get();
        $categories = Categories::orderBy('category_name','ASC')->get();
        $brands = Brands::orderBy('brand_name','ASC')->get();
        $new_products = Products::orderBy('id','DESC')->limit(3)->get();

        return view('shop.products.search',compact('products','item','new_products','categories','brands'));

    }


}
