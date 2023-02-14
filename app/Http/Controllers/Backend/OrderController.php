<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Auth;

class OrderController extends Controller
{
    public function Pending(){

        $orders = Order::orderBy('id','DESC')->get();
        return view('admin.orders.pending',compact('orders'));

    } // End Function

    public function Details($order_id){

        $order = Order::with('user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('admin.orders.details',compact('order','orderItem'));

    } // End Function

    public function Confirm($order_id){

        Order::findOrFail($order_id)->update(['status'=>'Done']);

        $notification = array(
                'message' => 'Mise à jour avec succès',
                'alert-type' => 'success'
            );


        return redirect()->back()->with($notification);

    } // End Function

    public function Return($order_id){

        Order::findOrFail($order_id)->update(['status'=>'Returned']);

        $notification = array(
                'message' => 'Mise à jour avec succès',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);

    } // End Function

    public function Cancel($order_id){

        Order::findOrFail($order_id)->update(['status'=>'Cancelled']);

        $notification = array(
                'message' => 'Mise à jour avec succès',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);

    } // End Function

    public function Delete($order_id){

        Order::findOrFail($order_id)->delete();

        $notification = array(
            'message' => 'Produit supprimé avec succès',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);

    } // End function

    public function Invoice($order_id){

        $order = Order::with('user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('admin.orders.invoice',compact('order','orderItem'));
        
    } // End Function

}
