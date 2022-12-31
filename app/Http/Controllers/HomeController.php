<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalUsers = User::count();
        return view('dashboard.index',compact('totalOrders','totalUsers'));
    }
    public function indexProductList(){
        $products = Product::get();
        return view('feuser.product',compact('products'));
    }
    public function orderHistory(){
        $orders = Order::where('user_id',auth()->user()->id)->get();
        return view('feuser.order.index',compact('orders'));
    }
    public function createOrder($idProduct){
        $product = Product::whereId($idProduct)->first();
        return view('feuser.order.create', compact('product'));
    }
    public function storeOrder(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'product_id' => 'required',
            'address' => 'required',
            'total_orders' => 'required',
            'expedition' => 'required',
            'proof_of_payment' => 'required',
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    //
                }
            }
            return back()->withInput();
        }else{
            $image_path = $request->file('proof_of_payment')->store('proof', 'public');
            try {
                $isCreated = Order::create([
                    'user_id' => $request->input('user_id'),
                    'product_id' => $request->input('product_id'),
                    'address' => $request->input('address'),
                    'total_orders' => $request->input('total_orders'),
                    'expedition' => $request->input('expedition'),
                    'proof_of_payment' => $image_path,
                ]);
                if($isCreated){
                    $product = Product::whereId($request->input('product_id'))->first();
                    $product->update([
                        'stock' => $product->stock - $request->input('total_orders')
                    ]);
                    return back();
                }else{
                    //
                    return back()->withInput();
                }
            } catch (Throwable $throw) {
                //
                return back()->withInput();
            }

        }
    }
    public function indexCart(){
        $carts = Cart::get();
        return view('feuser.cart',compact('carts'));
    }
    public function addToCart($id){
        $isCreated = Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
            'total_orders' => 1
        ]);
        if($isCreated){
            return back();
        }else{
            //
            return back()->withInput();
        }
    }

    public function destroycart($id){
        $product = Cart::whereId($id)->first();
        $isExist = isset($product);
        if($isExist){
            $isDeleted = $product->delete();
            if($isDeleted){
                //
                return back();
            }else{
                //
                return back()->withInput();
            }
        }else{
            //
            return redirect(route('indexCart'));
        }
    }
}
