<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    } //End Function

    public function AdminLogin(){
        return view('admin.login');
    } //End Function

    public function AdminProfile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.profile',compact('adminData'));
    } //End Function

    public function AdminProfileSave(Request $request){
    
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if  ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('adminbackend/upload/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('adminbackend/upload'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile mise à jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    } //End Function


    public function AdminProfilePassword(){
        return view('admin.password');
    } //End Function

    public function AdminProfilePasswordUpdate(Request $request){
        //Validation Function
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, auth::user()->password)){
            return back()->with("error", "L'ancien mot de passe n'est pas valide.");
        }

        //Update Ne Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status" , "Mot de passe mise à jour avec succès.");

    } //End Function


    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } //End Function

}
