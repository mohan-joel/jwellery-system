<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function showWeightConverter()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.weightConverter',compact('year','logo'));
    }

    public function showProfileSetting()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $user = User::find($uid);
        return view('user.profileSetting',compact('year','logo','user'));
    }

    public function checkCurrentPassword($current_password)
    {
        $id = Auth::user()->id;
        $password = Auth::user()->password;
        if(Hash::check($current_password, $password)){
            echo "true";
       }else{
            echo "false";
       }
    }

    public function updateProfileInfo(Request $request, $id)
    {
        if($request->current_password =='' && $request->new_password =='' && $request->confirm_new_password == '')
        {
            $profileInfo = User::find($id);
            $profileInfo->name = $request->fullname;
            $profileInfo->email = $request->email;
            $profileInfo->update();
        }
        else
        {
            $profileInfo = User::find($id);
            $profileInfo->name = $request->fullname;
            $profileInfo->email = $request->email;
            $profileInfo->password = Hash::make($request->new_password);
            $profileInfo->update();
        }
        
        return redirect('/show-profile-setting')->with('success','Profile Info Updated Successfully');
    }

    public function updateProfilePic(Request $request, $id)
    {
        $validate = $request->validate([
            'profilePic'=>'required|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $user =User::find($id);
        if($request->file('profilePic')->isValid()){
            $profilePic = $request->file('profilePic');
            $imageOriginalName = $request->file('profilePic')->getClientOriginalName();
            $profilePic->move(public_path('/uploads/profile_image/'),$imageOriginalName);
            $user->image = $imageOriginalName;
        }
        $user->update();
        return redirect('/show-profile-setting')->with('success','Profile Image Changed Successfully');
    }
   
}
