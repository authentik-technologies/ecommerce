<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Mail\OrderMailAdmin;
use Auth;


class StripeController extends Controller
{
    public function StripePayment(Request $request){

        

        \Stripe\Stripe::setApiKey('sk_test_51IcGPHCviSSQY4SQMJTjG6I2cy1Hk4mIl1jUv4raksL8o3CN4rBmfU1zs0cbE2zhqjHM9FL5zHMnjvT1gAVwwcqk00xSRfPhCo');

        $token = $_POST['stripeToken'];

        $cartTotal = Cart::total();
        
        
        $charge = \Stripe\Charge::create([
          'amount' => $cartTotal*100,
          'currency' => 'cad',
          'description' => 'Plancher Laurentides - Test Charge',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

        $cartSubTotal = Cart::subtotal();
        $cartTax = Cart::tax();

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'billing_cname' => $request->billing_cname,
            'billing_address' => $request->billing_address,
            'billing_unit' => $request->billing_unit,
            'billing_province' => $request->billing_province,
            'billing_city' => $request->billing_city,
            'billing_postal' => $request->billing_postal,
            'phone' => $request->phone,
            'shipping_name' => $request->shipping_name,
            'shipping_cname' => $request->shipping_cname,
            'shipping_province' => $request->shipping_province,
            'shipping_address' => $request->shipping_address,
            'shipping_unit' => $request->shipping_unit,
            'shipping_city' => $request->shipping_city,
            'shipping_postal' => $request->shipping_postal,

            'payment_type' => $charge->payment_method,
            'payment_method' => 'Carte de crédit',
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $charge->amount,
            'sub_amount' => $request->sub_amount,
            'amount_tax' => $request->amount_tax,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'PL'.mt_rand(100000,999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);
        

        $carts = Cart::content();

        foreach($carts as $cart){
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => carbon::now(),
            ]);

        } // End For Each

        // Sending email function

        $invoice = Order::findOrFail($order_id);

        $data = [

            'name' => $invoice->name,
            'email' => $invoice->email,
            'billing_cname' => $invoice->billing_cname,
            'billing_address' => $invoice->billing_address,
            'billing_unit' => $invoice->billing_unit,
            'billing_province' => $invoice->billing_province,
            'billing_city' => $invoice->billing_city,
            'billing_postal' => $invoice->billing_postal,
            'phone' => $invoice->phone,
            'shipping_name' => $invoice->shipping_name,
            'shipping_cname' => $invoice->shipping_cname,
            'shipping_province' => $invoice->shipping_province,
            'shipping_address' => $invoice->shipping_address,
            'shipping_unit' => $invoice->shipping_unit,
            'shipping_city' => $invoice->shipping_city,
            'shipping_postal' => $invoice->shipping_postal,

            'amount' => $invoice->amount,
            'sub_amount' => $invoice->sub_amount,
            'amount_tax' => $invoice->amount_tax,
            'invoice_no' => $invoice->invoice_no,
            'order_date' => $invoice->order_date,

        ];
        // Send email to client/users
        Mail::to($request->email)->send(new OrderMail($data));
        // Send email to admin
        Mail::to('jeremyhcampbell@gmail.com', 'Nouvelle Commande')->send(new OrderMailAdmin($data));

        Cart::destroy();

        $notification = array(
            'message' => 'Commande effectué avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('shop.account.dashboard')->with($notification);



        // The dd Function is used to test Stripe payment. returns $charge values.
        // dd($charge);


    } // End Function
}
