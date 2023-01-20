<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class SlidersController extends Controller
{
    public function AllSliders(){
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index',compact('sliders'));
    }

    public function AddSliders(){
        return view('admin.sliders.add');
    }

    public function SaveSliders(Request $request){

        $image = $request->file('image');
        $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/sliders_img/'.$name_generate);
        $save_url = 'upload/sliders_img/'.$name_generate;
    
        Slider::insert([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'image' => $save_url,
        ]);
    
        $notification = array(
            'message' => 'Ajouté avec succès',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.sliders.index')->with($notification);
        }
    
        public function EditSliders($id){
            $sliders = Slider::findOrFail($id);
            return view('admin.sliders.edit',compact('sliders'));
        }
    
        public function UpdateSliders(Request $request)
        
        {
    
            $slider_id = $request->id;
            $old_image = $request->old_image;
    
            if($request->file('image'))
            {
                $image = $request->file('image');
                $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->save('upload/sliders_img/'.$name_generate);
                $save_url = 'upload/sliders_img/'.$name_generate;
    
                if (file_exists($old_image)){
                    unlink($old_image);
                }
    
                Slider::findOrFail($slider_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                    'image' => $save_url,
                ]);
    
                $notification = array(
                    'message' => 'Mise à jour avec succès',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('admin.sliders.index')->with($notification);
            } else 
            
            {
                Slider::findOrFail($slider_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                ]);
    
                $notification = array(
                    'message' => 'Mise à jour avec succès sans image',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('admin.sliders.index')->with($notification);
    
            }
        }
    
        public function DeleteSliders($id){
            $slider_id = Slider::findOrFail($id);
            $image = $slider_id->image;
            unlink($image);
    
            Slider::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'Supprimé avec succès',
                'alert-type' => 'warning'
            );
    
            return redirect()->route('admin.sliders.index')->with($notification);
        }
}
