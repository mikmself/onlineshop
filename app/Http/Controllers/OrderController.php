<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::get();
        return response()->view('dashboard.master.order.index',compact('orders'));
    }
    public function destroy($id)
    {
        $order = Order::whereId($id)->first();
        $isExist = isset($order);
        if($isExist){
            $isDeleted = $order->delete();
            if($isDeleted){
                //
                return back();
            }else{
                //
                return back()->withInput();
            }
        }else{
            //
            return redirect(route('indexorder'));
        }
    }
    public function accorder($id){
        Order::whereId($id)->update([
            'status' => 'acc'
        ]);
        return back();
    }
}
