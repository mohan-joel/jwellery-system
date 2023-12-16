<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function ResetForm()
    {
        return view('auth.reset-form');
    }

    public function ResetHandler(Request $request)
    {
        $validate = $request->validate([
            'email'=>'required|email|exists:users,email',
            'new_password'=>'required|min:6',
            'confirm_new_password'=>'same:new_password',
        ],[
            'email.required'=>'The email field is required.',
            'email.email'=>'Invalid email address',
            'email.exists'=>'This email address is not registered in database',
            'new_password.required'=>'Please enter new password',
            'confirm_new_password'=>'Confirm new password and new password must match',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            
        ])->first();

        if(!$check_token){
            session()->flash('fail','Invalid Token');
        }else{
            User::where('email',$request->email)->update([
                'password'=>Hash::make($request->new_password)
            ]);
            DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            $success_token = Str::random(64);
            

            return redirect('/login')->with('success','Your Password has been updated successfully');
        }
    }
}
