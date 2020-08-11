<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function getProfile(){
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function postProfile(Request $request){
        $user = Auth::user();
       $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);


        $data = $request->except(["password","password_confirmation","_token"]);

        if($request->password || $request->password_confirmation){
            $this->validate($request,[
                'password' => 'required|confirmed|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            ]);
            $data["password"]=Hash::make($request->password);
        }

        $user->update($data);
        $request->session()->flash('alert-success', 'Profile has been updated successfully.');
        return redirect()->back();
    }
}
