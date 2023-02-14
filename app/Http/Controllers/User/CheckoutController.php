<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;

class CheckoutController extends Controller
{
    public function Checkout(){

        if (Auth::check()){

            if(Cart::total() > 0){

                $cartContent = Cart::content();
                $cartQty = Cart::count();
                $cartSubTotal = Cart::subtotal();
                $cartTax = Cart::tax();
                $cartTotal = Cart::total(); 

                return view('shop.checkout', compact('cartContent','cartQty','cartSubTotal','cartTax','cartTotal'));


            }else{

                $notification = array(
                    'message' => 'Ajouter un produit dans votre panier',
                    'alert-type' => 'error'
                );
    
                return redirect()->back()->with($notification);
            }

        }else{

            $notification = array(
                'message' => 'Veuillez-vous identifier',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);

        }

        
    }

    public function CheckoutSave(Request $request){


        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->billing_cname = $request->billing_cname;
        $data->billing_unit = $request->billing_unit;
        $data->billing_postal = $request->billing_postal;
        $data->billing_city = $request->billing_city;
        $data->billing_province = $request->billing_province;
        $data->shipping_name = $request->shipping_name;
        $data->shipping_cname = $request->shipping_cname;
        $data->shipping_province = $request->shipping_province;
        $data->shipping_address = $request->shipping_address;
        $data->shipping_unit = $request->shipping_unit;
        $data->shipping_city = $request->shipping_city;
        $data->shipping_postal = $request->shipping_postal;
        
        $data->save();


        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['billing_cname'] = $request->billing_cname;
        $data['billing_address'] = $request->billing_address;
        $data['billing_unit'] = $request->billing_unit;
        $data['billing_province'] = $request->billing_province;
        $data['billing_city'] = $request->billing_city;
        $data['billing_postal'] = $request->billing_postal;
        $data['phone'] = $request->phone;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_cname'] = $request->shipping_cname;
        $data['shipping_province'] = $request->shipping_province;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_unit'] = $request->shipping_unit;
        $data['shipping_city'] = $request->shipping_city;
        $data['shipping_postal'] = $request->shipping_postal;

        $cartTotal = Cart::total();
        $cartSubTotal = Cart::subtotal();
        $cartTax = Cart::tax();
        
        

        if ($request->payment_option == 'stripe'){
            return view('shop.payments.cc',compact('data','cartTotal','cartSubTotal','cartTax'));
        }elseif ($request->payment_option == 'cash'){
            return view('shop.payments.cash',compact('data','cartTotal','cartSubTotal','cartTax'));
        }else{
            return view('shop.checkout');
        }
        
    }
}
