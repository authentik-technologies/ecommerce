<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Image;

class CategoriesController extends Controller
{
    public function AllCategories(){
        $categories = Categories::latest()->get();
        return view('admin.categories.index',compact('categories'));
    }

    public function AddCategories(){
        return view('admin.categories.add');
    }

    public function SaveCategories(Request $request){

    $image = $request->file('category_image');
    $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(120,120)->save('upload/categories_img/'.$name_generate);
    $save_url = 'upload/categories_img/'.$name_generate;

    Categories::insert([
        'category_name' => $request->category_name,
        'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
        'category_image' => $save_url,
    ]);

    $notification = array(
        'message' => 'Ajouté avec succès',
        'alert-type' => 'success'
    );

    return redirect()->route('admin.categories.index')->with($notification);
    }

    public function EditCategories($id){
        $categories = Categories::findOrFail($id);
        return view('admin.categories.edit',compact('categories'));
    }

    public function UpdateCategories(Request $request)
    
    {

        $category_id = $request->id;
        $old_image = $request->old_image;

        if($request->file('category_image'))
        {
            $image = $request->file('category_image');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(120,120)->save('upload/categories_img/'.$name_generate);
            $save_url = 'upload/categories_img/'.$name_generate;

            if (file_exists($old_image)){
                unlink($old_image);
            }

            Categories::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
                'category_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Mise à jour avec succès',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.categories.index')->with($notification);
        } else 
        
        {
            Categories::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            ]);

            $notification = array(
                'message' => 'Mise à jour avec succès sans image',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.categories.index')->with($notification);

        }
    }

    public function DeleteCategories($id){
        $category_id = Categories::findOrFail($id);
        $image = $category_id->category_image;
        unlink($image);

        Categories::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supprimé avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.categories.index')->with($notification);
    }
}
