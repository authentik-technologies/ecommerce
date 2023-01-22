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


    public function addToCart(Request $request, $id){

        $product = Product::findOrFail($id);

        if ($product->product_discount == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->product_qty,
                'price' => $product->product_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
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
                ],
            ]);

            return response()->json(['success' => 'Ajouté au panier avec succès' ]);
        }
    }// End Method
}
