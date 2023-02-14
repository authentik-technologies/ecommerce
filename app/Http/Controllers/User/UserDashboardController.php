<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class UserDashboardController extends Controller
{
    public function UserAccount(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('shop.account.details',compact('userData'));
    } // End Function

    public function UserAddress(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('shop.account.address',compact('userData'));
    } // End Function

    public function UserOrders(){

        $id = Auth::user()->id;
        $orders = Order::where('user_id',$id)->orderBy('id','DESC')->get();

        return view('shop.account.orders',compact('orders'));
    } // End Function

    public function UserOrdersDetails($order_id){

        $order = Order::with('user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('shop.account.orders.details',compact('order','orderItem'));
        
    } // End Function

    public function UserOrdersInvoice($order_id){

        $order = Order::with('user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('shop.account.orders.invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('facture.pdf');
        
    } // End Function

    public function UserPassword(){

        return view('shop.account.password',compact('userData'));
    } // End Function

    public function UserTracking(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('shop.account.tracking',compact('userData'));
    } // End Function
}
