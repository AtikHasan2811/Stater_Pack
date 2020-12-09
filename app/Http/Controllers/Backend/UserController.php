<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class UserController extends Controller
{
    public  function  view(){

        $data=array();
        $data['allData']=User::all();
      return view('backend.user.view_user',$data);
    }

    public function add(){
        return view('backend.user.add_user');
    }

//Full texts
//id
//name
//user_type
//email
//mobile
//address
//gender
//image
//status
//email_verified_at
//password

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',
        ]);

        $data = new User();
        $data->user_type= $request->user_type;
        $data->name= $request->name;
        $data->email= $request->email;
        $data->password= bcrypt($request->password);
        $data->save();
        return redirect()->route('users.view')->with('success','Data Save successfully');


    }

    public function edit($id){
        $data=User::find($id);
        return view('backend.user.edit_user',compact('data'));
    }

    public function delete($id){
        $data=User::find($id);
        $data->delete();
        return back()->with('success','Data Delete successfully');
    }

    public function update(Request $request,$id){
      $data=User::find($id);
        $data->user_type= $request->user_type;
        $data->name= $request->name;
        $data->email= $request->email;
        $data->password= bcrypt($request->password);
        $data->save();
        return redirect()->route('users.view')->with('success','Data Update successfully');
    }


}
