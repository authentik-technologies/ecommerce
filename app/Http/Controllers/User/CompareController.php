<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompareController extends Controller
{
    public function AddToCompare(Request $request, $product_id){

        if (Auth::check()){
            $exists = Compare::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists){
                Compare::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Ajouté pour comparaison']);
            }else{
                return response()->json(['error' => 'Produits déjà dans la liste de comparaison']);
            }

        } else
            return response()->json(['error' => 'Veuillez-vous identifier']);

    } // End Function

    public function AllCompare(){

        return view('shop.compare');
    }

    public function GetCompare(){

        $compare = Compare::with('product')->where('user_id', Auth::id())->latest()->get();

        $compareQty = Compare::count();

        return response()->json(['compare' => $compare, 'compareQty' => $compareQty]);

        
    } // End Function


    public function RemoveCompare($id){

        Compare::where('user_id', Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Produit retiré avec succès']);
        
    } // End Function
}
