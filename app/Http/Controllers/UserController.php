<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login_get(){
        return view('user.login');
    }

    public function login_post(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
       if(Auth::attempt($credentials)){
            return redirect()->route('home');
       }else{
        toastr()->errer("Login Failed, Please try again");
        return back();
       }
    }

    public function signup_get(){
        return view('user.signup');
    }

    public function signup_post(Request $request){
        $request->validate([
            'username'=>'required|string',
            'email'=>'required|email',
            'password'=>'required',
            'avatar'=>'required|mimes:jpg,png|max:2024'
        ]);

        try{
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->password;
            $user->password = bcrypt($request->password);
            $user->role = 'reader';
            //upload user avatar
            $file_name = pathinfo($request->file('avatar')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();

            $path = $request
                ->file('avatar')
                ->storeAs(
                    'public/files',
                    str_replace(' ', '_', date('ymdhis').strtolower($file_name)).".".$extension
                );

            $user->avatar = explode('/', $path)[2];
            $user->save();
            
            toastr()->success('Account Created Successfully');
            return redirect()->route('home');
        }catch(\Exception $e){
          
            toastr()->error('Failed To Create Account');
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

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }


}
