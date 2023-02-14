<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use PDF;
use DateTime;

class ReportsController extends Controller
{
    public function Index(){
        
        return view('admin.reports.index');
    }

    public function ByDate(Request $request){

        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date', $formatDate)->latest()->get();
        
        return view('admin.reports.date',compact('orders'));
    }
}
