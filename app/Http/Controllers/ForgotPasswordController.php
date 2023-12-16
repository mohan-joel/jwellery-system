<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('auth.forgot');
    }

    public function ForgotHandler(Request $request)
    {
       $validate = $request->validate([
            'email'=>'required|email|exists:users,email',
        ],[
            'email.required'=>'Email is required',
            'email.email'=>'Invalid email address',
            'email.exists'=>'Email is not registered  in database',
        ]);

        $token = base64_encode(Str::random(64));
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $user = User::where('email',$request->email)->first();
        $link  = route('auth.reset-form',['token'=>$token,'email'=>$request->email]);
        $body_message = "We received a request to reset the password for <b>jwellery-system</b> account associated with ".$request->email.".<br> You can reset your password by clicking the button below.";
        $body_message.='<br>';
        $body_message.='<a href="'.$link.'" target="_blank" style="color:#FFF; border-color:#22bc66;border-style:solid; border-width:10px 180px; background-color:#22bc66;display:inline-block; text-decoration:none; border-radius:3px;box-shadow:0 2px 3px rgba(0,0,0,0.16); -webkit-text-size-adjust:none;box-sizing:border-box;">Reset Password</a>'; 
        $body_message.='<br>';
        $body_message.='If you did not request for a password reset, please ignore this email';

        $data = array(
            'name'=>$user->name,
            'body_message'=>$body_message,
        );

        Mail::send('forgot-email-template', $data, function($message) use ($user){
            $message->from('bashyalmohan77@gmail.com','jwellery-system');
            $message->to($user->email, $user->name)
                    ->subject('Reset Password');
        });

        $request->email = null;
        session()->flash('success','We have emailed your password  reset link');
        return redirect()->back();

    }

    
}
