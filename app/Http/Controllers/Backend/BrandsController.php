<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use Image;

class BrandsController extends Controller
{
    public function AllBrands(){
        $brands = Brands::latest()->get();
        return view('admin.brands.index',compact('brands'));
    }

    public function AddBrands(){
        return view('admin.brands.add');
    }

    public function SaveBrands(Request $request){

    $image = $request->file('brand_image');
    $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/brands_img/'.$name_generate);
    $save_url = 'upload/brands_img/'.$name_generate;

    Brands::insert([
        'brand_name' => $request->brand_name,
        'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
        'brand_image' => $save_url,
    ]);

    $notification = array(
        'message' => 'Ajouté avec succès',
        'alert-type' => 'success'
    );

    return redirect()->route('admin.brands.index')->with($notification);
    }

    public function EditBrands($id){
        $brands = Brands::findOrFail($id);
        return view('admin.brands.edit',compact('brands'));
    }

    public function UpdateBrands(Request $request)
    
    {

        $brand_id = $request->id;
        $old_image = $request->old_image;

        if($request->file('brand_image'))
        {
            $image = $request->file('brand_image');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brands_img/'.$name_generate);
            $save_url = 'upload/brands_img/'.$name_generate;

            if (file_exists($old_image)){
                unlink($old_image);
            }

            Brands::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
                'brand_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Mise à jour avec succès',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.brands.index')->with($notification);
        } else 
        
        {
            Brands::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            ]);

            $notification = array(
                'message' => 'Mise à jour avec succès sans image',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.brands.index')->with($notification);

        }
    }

    public function DeleteBrands($id){
        $brand_id = Brands::findOrFail($id);
        $image = $brand_id->brand_image;
        unlink($image);

        Brands::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supprimé avec succès',
            'alert-type' => 'warning'
        );

        return redirect()->route('admin.brands.index')->with($notification);
    }
}
