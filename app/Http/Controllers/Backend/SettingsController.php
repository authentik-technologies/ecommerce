<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Image;


class SettingsController extends Controller
{
    Public function Index(){
        return view('admin.settings.index');
    }

    Public function SiteSettings(){
        $setting = Settings::find(1);
        return view('admin.settings.site.index',compact('setting'));
    }

    public function SaveSiteSettings(Request $request){


        $setting_id = $request->id;
        $old_image = $request->old_image;

        if($request->file('logo'))
        {
            $image = $request->file('logo');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/admin_img/'.$name_generate);
            $save_url = 'upload/admin_img/'.$name_generate;

            if (file_exists($old_image)){
                unlink($old_image);
            }

            Settings::findOrFail($setting_id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'messages' => $request->message,
                'copyright' => $request->copyright,
                'facebook' => $request->facebook,
                'address' => $request->address,
                'logo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Mise à jour avec succès',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.settings.index')->with($notification);
        } else 
        
        {
            Settings::findOrFail($setting_id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'messages' => $request->message,
                'copyright' => $request->copyright,
                'facebook' => $request->facebook,
                'address' => $request->address,
            ]);

            $notification = array(
                'message' => 'Mise à jour avec succès',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.settings.index')->with($notification);

        }
    }
}
