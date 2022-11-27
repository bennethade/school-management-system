<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView()
    {
        // dd('view user'); 
        // $allData = User::all();      ///ELOQUENT ORM
        // return view('backend.user.view_user',compact('allData'));

        $data['allData'] = User::where('usertype','Admin')->get();     ///QUERRY BUILDER
        return view('backend.user.view_user', $data);
    }



    public function userAdd()
    {
        return view('backend.user.add_user');
    }


    public function userStore(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);

        $data = new User();
        $code = rand(0000,9999);  //AUTO-GENERATING A LOGIN PIN
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        $data->save();

        $notification  = array(
            'message' => 'User Inserted Successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('user.view')->with($notification);
    }


    public function userEdit($id)
    {
        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));
    }


    public function userUpdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->save();

        $notification  = array(
            'message' => 'User Updated Successfully!',
            'alert-type' => 'info'
        );
        
        return redirect()->route('user.view')->with($notification);
    }


    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification  = array(
            'message' => 'User Deleted Successfully!',
            'alert-type' => 'warning'
        );
        
        return redirect()->route('user.view')->with($notification);
 
    }










}
