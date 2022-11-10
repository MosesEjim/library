<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function signup_get(){
        return view('user.signup');
    }

    public function login_get(){
        return view('user.login');
    }

    public function signup_post(Request $request){
        $request->validate([
            'username'=>'required|string',
            'email'=>'required|email|exists:users',
            'password'=>'required',
            'avatar'=>'required|mimes:jpg,png|max:2024'
        ]);

        try{
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->password;
            $user->password = bcrypt($request->password);

            //upload user avatar
            $fileName = pathinfo($request->file('avatar')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();

            $path = $request
                ->file('avatar')
                ->storeAs(
                    'public/files',
                    str_replace(' ', '_', new Date('ymdhis').strtolower($fileName)).".".$extension
                );

            $user->avatar = explode('/'. $path)[2];
            $user->save();
        }catch(\Exception $e){
            return back();
        }
    }

    public function edit_profile(Request $request, $id){
        $request->validate([
            'username'=>'required|string',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        try{
            $user = User::find($id);
            $user->username = $request->username;
            $user->email = $request->password;
            $user->password = $request->password;

            //check if request contains a new avatar
            if($request->hasFile('avatar')){
                //delete old avatar
                if($user->avatar != null){
                    Storage::delete($request->avatar);
                }

            //upload user avatar
            $fileName = pathinfo($request->file('avatar')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();

            $path = $request
                ->file('avatar')
                ->storeAs(
                    'public/files',
                    str_replace(' ', '_', new Date('ymdhis').strtolower($fileName)).".".$extension
                );

            $user->avatar = explode('/'. $path)[2];
                
            }

            $user->update();
        }catch(\Exception $e){
            return back();
        }
        
    }


}
