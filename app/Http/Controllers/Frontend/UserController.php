<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function UserDashboard(){

        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('shop.account.dashboard',compact('userData'));
    }

    public function UserShippingUpdate(Request $request){
    
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->shipping_address = $request->shipping_address;
        $data->shipping_postal = $request->shipping_postal;
        $data->shipping_city = $request->shipping_city;
        $data->shipping_province = $request->shipping_province;
        $data->shipping_country = $request->shipping_country;
        
        $data->save();

        return redirect()->back();
        
    } //End Function

    public function UserBillingUpdate(Request $request){
    
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->billing_address = $request->billing_address;
        $data->billing_postal = $request->billing_postal;
        $data->billing_city = $request->billing_city;
        $data->billing_province = $request->billing_province;
        $data->billing_country = $request->billing_country;
        
        $data->save();

        return redirect()->back();
        
    } //End Function

    public function UserProfileSave(Request $request){
    
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->website_url = $request->website_url;
        $data->twitter_url = $request->twitter_url;
        $data->facebook_url = $request->facebook_url;
        $data->instagram_url = $request->instagram_url;
        
        if  ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_img/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_img/'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile mise à jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    } //End Function

    public function UserPasswordSave(Request $request){
        //Validation Function
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, auth::user()->password)){
            return back()->with("error", "L'ancien mot de passe n'est pas valide.");
        }

        //Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        
        return back()->with("status" , "Mot de passe mise à jour avec succès.");

    } //End Function

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Session terminé avec succès',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);


    } //End Function

}
