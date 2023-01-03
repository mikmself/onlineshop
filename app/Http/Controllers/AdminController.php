<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AdminController extends Controller
{
    public function index(){
        $users = User::where('level','admin')->get();
        return response()->view('dashboard.master.admin.index',compact('users'));
    }
    public function create()
    {
        return response()->view('dashboard.master.admin.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'telp' => 'required',
            'password' => 'required'
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
                $isCreated = User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'level' => "admin",
                    'telp' => $request->input('telp')
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
        $user = User::whereId($id)->first();
        $isExist = isset($user);
        if($isExist){
            return response()->view('dashboard.master.admin.edit',compact('user'));
        }else{
            //
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'telp' => 'required'
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    //
                }
            }
            return back()->withInput();
        }else{
            $user = User::whereId($id)->first();
            $isExist = isset($user);
            if($isExist){
                $isUpdated = $user->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('newpassword')),
                    'telp' => $request->input('telp'),
                ]);
                if($isUpdated){
                    //
                    return back();
                }else{
                    //
                    return back()->withInput();
                }
            }else{
                //
                return redirect(route('indexuser'));
            }
        }
    }
    public function destroy($id)
    {
        $user = User::whereId($id)->first();
        $isExist = isset($user);
        if($isExist){
            $isDeleted = $user->delete();
            if($isDeleted){
                //
                return back();
            }else{
                //
                return back()->withInput();
            }
        }else{
            //
            return redirect(route('indexuser'));
        }
    }
}
