<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Carbon\Carbon;


class ShippingController extends Controller
{

    // DIVISION FUNCTIONS

    public function AllDivision(){
        $division = ShippingDivision::latest()->get();
        return view('admin.shipping.index', compact('division'));
    }

    public function AddDivision(){
        return view('admin.shipping.add');
    }

    public function SaveDivision(Request $request){

        ShippingDivision::insert([
            'division_name' => $request->division_name,
            
        ]);
    
        $notification = array(
            'message' => 'Ajouté avec succès',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.shipping.index')->with($notification);
    }

    public function EditDivision($id){

        $division = ShippingDivision::findOrFail($id);
        return view('admin.shipping.edit', compact('division'));
    }

    public function UpdateDivision(Request $request){

        $division_id = $request->id;

        ShippingDivision::findOrFail($division_id)->update([
            'division_name' => $request->division_name,        
        ]);
    
        $notification = array(
            'message' => 'Modifié avec succès',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.shipping.index')->with($notification);
    }

    public function DeleteDivision($id){

        ShippingDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supprimé avec succès',
            'alert-type' => 'warning'
        );
        return redirect()->route('admin.shipping.index')->with($notification);
    }

    // DISTRICT FUNCTIONS

    public function AllDistrict(){
        $district = ShippingDistrict::latest()->get();
        return view('admin.shipping.district.index', compact('district'));
    }













    // STATE FUNCTIONS

    public function AllState(){
        $district = ShippingState::latest()->get();
        return view('admin.shipping.state.index', compact('district'));
    }

}
