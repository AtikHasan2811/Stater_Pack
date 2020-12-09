<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Auth;
use App\User;


class ProfileController extends Controller
{
    public function view(){
        $id=Auth::user()->id;
        $data=User::find($id);
        return view('backend.user.view_profile',compact('data'));
    }

    public function edit(){
        $id=Auth::user()->id;
        $data=User::find($id);
        return view('backend.user.edit_profile',compact('data'));
    }

    public function update(Request $request){
//        return $request;

        $data=User::find(Auth::user()->id);
        $data->name= $request->name;
        $data->email= $request->email;
        $data->mobile= $request->mobile;
        $data->address= $request->address;
        $data->gender= $request->gender;
        $image = $request->file('image');
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = uniqid().'-'.$currentDate.'.'.$image->getClientOriginalExtension();
            if (!file_exists('public/uploads/')){
                mkdir('public/uploads',0777,true);
            }
            $image->move('public/uploads',$imageName);
            $data->image =$imageName;
        }else{
            $imageName = 'default.png';
        }

        $data->save();
        return redirect()->route('profiles.view')->with('success','Profile Update successfully');
    }

    public function change_password(){
        return view('backend.user.change_password');

    }

    public function password_update(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'new_password' => 'required',
            'again_new_password' => 'required',

        ]);



        if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            if ($request->new_password==$request->again_new_password){
                $data = User::find(Auth::user()->id);
                $data->password = bcrypt($request->new_password);
                $data->save();
                return redirect()->route('profiles.view')->with('success','password change successfully');
            }else{
                return redirect()->back()->with('error','Sorry! your new password and confirm password not match ');
            }
        }else{
            return redirect()->back()->with('error','Sorry! your current password does not match ');
        }

    }



}
