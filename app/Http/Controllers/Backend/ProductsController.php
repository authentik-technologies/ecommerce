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
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function AllProducts(){
        $products = Products::latest()->get();
        return view('admin.products.index',compact('products'));
    }

    public function AddProducts(){
    
        $brands =  Brands::latest()->get();
        $categories = Categories::latest()->get();
        
        return view('admin.products.add',compact('brands','categories'));
    }

    public function SaveProducts(Request $request){

        $image = $request->file('product_thumbnail');
        $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/product_img/thumbnail/'.$name_generate);
        $save_url = 'upload/product_img/thumbnail/'.$name_generate;

        $product_id = Products::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace([' ', '/'],'-',$request->product_name)),

            'product_sku' => $request->product_sku,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_notes' => $request->product_notes,

            'product_price' => $request->product_price,
            'product_cost' => $request->product_cost,
            'product_discount' => $request->product_discount,
            'product_tax' => $request->product_tax,

            'product_status' => $request->product_status,
            'product_length' => $request->product_length,
            'product_width' => $request->product_width,
            'product_height' => $request->product_height,
            'product_weight' => $request->product_weight,
            'product_measurement' => $request->product_measurement,
            'product_coverage' => $request->product_coverage,
            
            'special_deal' => $request->special_deal,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'product_thumbnail' => $save_url,

            'created_at' => Carbon::now(),
        ]);

        // Multiple Image Upload

        $images = $request->file('multi_images');
        foreach($images as $image){
            $make_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/product_img/multi_img/'.$make_name);
            $uploadPath = 'upload/product_img/multi_img/'.$make_name;
            
            MultiImage::insert([

                'product_id' => $product_id,
                'image_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        } // End For Each
    
        $notification = array(
            'message' => 'Produit ajouté avec succès',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.products.index')->with($notification);
    }

    public function EditProducts($id){

        $multi_images = MultiImage::where('product_id',$id)->get();
        $brands =  Brands::latest()->get();
        $categories = Categories::latest()->get();
        $subcategories = SubCategories::latest()->get();
        $products = Products::findOrFail($id);
        
        return view('admin.products.edit',compact('brands','categories','subcategories','products','multi_images'));

    }

    public function UpdateProducts(Request $request){

        $product_id = $request->id;

        Products::findOrFail($product_id)->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace([' ', '/'],'-',$request->product_name)),

            'product_sku' => $request->product_sku,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_notes' => $request->product_notes,

            'product_price' => $request->product_price,
            'product_cost' => $request->product_cost,
            'product_discount' => $request->product_discount,
            'product_tax' => $request->product_tax,

            'product_status' => $request->product_status,
            'product_length' => $request->product_length,
            'product_width' => $request->product_width,
            'product_height' => $request->product_height,
            'product_weight' => $request->product_weight,
            'product_measurement' => $request->product_measurement,
            'product_coverage' => $request->product_coverage,
            
            'special_deal' => $request->special_deal,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,

            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Produit mise à jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.products.index')->with($notification);

    }

    public function DeleteProducts($id){

        $product = Products::findOrFail($id);
        unlink($product->product_thumbnail);
        Products::findOrFail($id)->delete();

        $images = MultiImage::where('product_id',$id)->get();
        foreach($images as $image){
            unlink($image->image_name);
            MultiImage::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Produit supprimé avec succès',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);

    }

    // Single Thumbnail Update
    public function UpdateProductsThumbnail(Request $request){

        $product_id = $request->id;
        $old_image = $request->old_image;

        $image = $request->file('product_thumbnail');
        $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/product_img/thumbnail/'.$name_generate);
        $save_url = 'upload/product_img/thumbnail/'.$name_generate;

        if (file_exists($old_image)){
            unlink($old_image);
        }

        Products::findOrFail($product_id)->update([

            'product_thumbnail'=> $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Image mise à jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    // Multiple Thumbnail Update
    public function UpdateProductsThumbnails(Request $request){

        $images = $request->multi_images;

        foreach($images as $id => $image){

            $imageDelete = MultiImage::findOrFail($id);
            unlink($imageDelete->image_name);

            $make_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/product_img/multi_img/'.$make_name);
            $uploadPath = 'upload/product_img/multi_img/'.$make_name;

            MultiImage::where('id',$id)->update([
                'image_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        } 

        $notification = array(
            'message' => 'Image mise à jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function DeleteProductsThumbnails($id){
        
        $old_image = MultiImage::findOrFail($id);
        unlink($old_image->image_name);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Image supprimé avec succès',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);

    }

    public function ActiveProducts($id){

        Products::findOrFail($id)->update(['product_status' => 'active']);
        $notification = array(
            'message' => 'Produits maintenant actif',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function InactiveProducts($id){

        Products::findOrFail($id)->update(['product_status' => 'inactive']);
        $notification = array(
            'message' => 'Produits maintenant inactif',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);

    }
}
