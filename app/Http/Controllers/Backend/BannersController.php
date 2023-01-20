<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;

class BannersController extends Controller
{
    public function AllBanners(){
        $banners = Banner::latest()->get();
        return view('admin.banners.index',compact('banners'));
    }

    public function AddBanners(){
        return view('admin.banners.add');
    }

    public function SaveBanners(Request $request){

        $image = $request->file('image');
        $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/banners_img/'.$name_generate);
        $save_url = 'upload/banners_img/'.$name_generate;
    
        Banner::insert([
            'title' => $request->title,
            'url' => $request->url,
            'image' => $save_url,
            'side_banner' => $request->side_banner,
        ]);
    
        $notification = array(
            'message' => 'Ajouté avec succès',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.banners.index')->with($notification);
        }
    
        public function EditBanners($id){
            $banners = Banner::findOrFail($id);
            return view('admin.banners.edit',compact('banners'));
        }
    
        public function UpdateBanners(Request $request)
        
        {
    
            $banner_id = $request->id;
            $old_image = $request->old_image;
    
            if($request->file('image'))
            {
                $image = $request->file('image');
                $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->save('upload/banners_img/'.$name_generate);
                $save_url = 'upload/banners_img/'.$name_generate;
    
                if (file_exists($old_image)){
                    unlink($old_image);
                }
    
                Banner::findOrFail($banner_id)->update([
                    'title' => $request->title,
                    'url' => $request->url,
                    'image' => $save_url,
                    'side_banner' => $request->side_banner,
                ]);
    
                $notification = array(
                    'message' => 'Mise à jour avec succès',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('admin.banners.index')->with($notification);
            } else 
            
            {
                Banner::findOrFail($banner_id)->update([
                    'title' => $request->title,
                    'url' => $request->url,
                    'side_banner' => $request->side_banner,
                ]);
    
                $notification = array(
                    'message' => 'Mise à jour avec succès sans image',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('admin.banners.index')->with($notification);
    
            }
        }
    
        public function DeleteBanners($id){
            $banner_id = Banner::findOrFail($id);
            $image = $banner_id->image;
            unlink($image);
    
            Banner::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'Supprimé avec succès',
                'alert-type' => 'warning'
            );
    
            return redirect()->route('admin.banners.index')->with($notification);
        }
}
