<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $product_id){

        if (Auth::check()){
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Ajouté aux favoris']);
            }else{
                return response()->json(['error' => 'Produits déjà dans vos favoris']);
            }

        } else
            return response()->json(['error' => 'Veuillez-vous identifier']);

    } // End Function

    public function AllWishlist(){

        return view('shop.wishlist');
    }

    public function GetWishlist(){

        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        $wishQty = Wishlist::count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);

        
    } // End Function


    public function RemoveWishlist($id){

        Wishlist::where('user_id', Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Produit retiré avec succès']);
        
    } // End Function
}
