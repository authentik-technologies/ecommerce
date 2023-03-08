<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;


class CartController extends Controller
{


    public function AddToCart(Request $request, $id){

        $product = Products::findOrFail($id);

        if ($product->product_discount == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->product_qty,
                'price' => $product->product_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'unit' => $product->product_measurement,
                ],
            ]);
            return response()->json(['success' => 'Ajouté au panier avec succès' ]);

            }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->product_qty,
                'price' => $product->product_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'unit' => $product->product_measurement,
                ],
            ]);

            return response()->json(['success' => 'Ajouté au panier avec succès' ]);
        }
    }// End Method

    public function MiniCart(){

        $cartContent = Cart::content();
        $cartQty = Cart::count();
        $cartSubTotal = Cart::subtotal();
        $cartTax = Cart::tax();
        $cartTotal = $cartSubTotal*1.14975/100;

        return response()->json([
            'cartContent' => $cartContent,
            'cartQty' => $cartQty,
            'cartSubTotal' => $cartSubTotal,
            'cartTax' => $cartTax,
            'cartTotal' => $cartTotal,
        ]);
    }// End Method

    public function RemoveMiniCart($rowid){

        Cart::remove($rowid);
        return response()->json(['success' => 'Produits supprimé du panier']);
        
    }// End Method

    public function RemoveCart($rowid){

        Cart::remove($rowid);
        return response()->json(['success' => 'Produits supprimé du panier']);
        
    }// End Method

    public function AllCart(){

        return view('shop.cart');
        
    }// End Method

    public function GetCart(){

        $cartContent = Cart::content();
        $cartQty2 = Cart::count();
        $cartSubTotal = Cart::subtotal();
        $cartTaxTPS = number_format($cartSubTotal*0.05, 2,".",",");
        $cartTaxTVQ = number_format($cartSubTotal*0.0975, 2,".",",");
        $cartTotal = $cartSubTotal*1.14975/100;

        return response()->json([
            'cartContent' => $cartContent,
            'cartQty2' => $cartQty2,
            'cartSubTotal' => $cartSubTotal,
            'cartTaxTPS' => $cartTaxTPS,
            'cartTaxTVQ' => $cartTaxTVQ,
            'cartTotal' => $cartTotal,
        ]);
    }// End Method

    public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty +1);

        return response()->json('Increment');       
    }// End Method

    public function CartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty -1);

        return response()->json('Decrement'); 
    }// End Method

   
}
