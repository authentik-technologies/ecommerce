<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategories;

class SubCategoriesController extends Controller
{
    public function AllSubCategories(){
        $subcategories = SubCategories::latest()->get();
        return view('admin.subcategories.index',compact('subcategories'));
    }

    public function AddSubCategories(){
        $categories = Categories::orderBy('category_name','ASC')->get();
        return view('admin.subcategories.add',compact('categories'));
    }

    public function SaveSubCategories(Request $request){

        SubCategories::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        ]);
    
        $notification = array(
            'message' => 'Ajouté avec succès',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.subcategories.index')->with($notification);
    }

    public function EditSubCategories($id){
        $categories = Categories::orderBy('category_name','ASC')->get();
        $subcategories = SubCategories::findOrFail($id);
        return view('admin.subcategories.edit',compact('categories','subcategories'));
    }

    public function UpdateSubCategories(Request $request){

        $subcategory_id = $request->id;

        SubCategories::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        ]);
    
        $notification = array(
            'message' => 'Modifié avec succès',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.subcategories.index')->with($notification);
    }

    public function DeleteSubCategories($id){

        SubCategories::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supprimé avec succès',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.subcategories.index')->with($notification);
    }
}
