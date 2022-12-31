<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::get();
        return response()->view('dashboard.master.product.index',compact('products'));
    }
    public function create()
    {
        return response()->view('dashboard.master.product.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'desc' => 'required',
            'img' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'price' => 'required',
            'stock' => 'required'
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    //
                }
            }
            return back()->withInput();
        }else{
            try {
                $image_path = $request->file('img')->store('product', 'public');
                $isCreated = Product::create([
                    'name' => $request->input('name'),
                    'desc' => $request->input('desc'),
                    'img' => $image_path,
                    'price' => $request->input('price'),
                    'stock' => $request->input('stock')
                ]);
                if($isCreated){
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
    public function edit($id)
    {
        $product = Product::whereId($id)->first();
        $isExist = isset($product);
        if($isExist){
            return response()->view('dashboard.master.product.edit',compact('product'));
        }else{
            //
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'desc' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    //
                }
            }
            return back()->withInput();
        }else{
            $product = Product::whereId($id)->first();
            $isExist = isset($product);
            if($isExist){
                $isUpdated = $product->update([
                    'name' => $request->input('name'),
                    'desc' => $request->input('desc'),
                    'price' => $request->input('price'),
                    'stock' => $request->input('stock')
                ]);
                if($request->hasFile('img')){
                    File::delete(public_path("/storage/" . $product->img));
                    $image_path = $request->file('img')->store('product', 'public');
                    $product->update([
                        'img' => $image_path
                    ]);
                }
                if($isUpdated){
                    //
                    return back();
                }else{
                    //
                    return back()->withInput();
                }
            }else{
                //
                return redirect(route('indexproduct'));
            }
        }
    }
    public function destroy($id)
    {
        $product = Product::whereId($id)->first();
        $isExist = isset($product);
        if($isExist){
            File::delete(public_path("/storage/" . $product->img));
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
            return redirect(route('indexproduct'));
        }
    }
}
