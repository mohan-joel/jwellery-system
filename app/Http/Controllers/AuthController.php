<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\JwelleryType;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Stock;
use App\Models\SaleOrder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
    public function login_view()
    {
        
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $req)
    {
        $validate = $req->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'confirm_password'=>'required|string',
            'role'=>'required|string',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);



        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->role = $req->role;
        if($req->file('image')->isValid()){
            $profilePic = $req->file('image');
            $newProfilePic = $req->file('image')->getClientOriginalName();
            $profilePic->move(public_path('uploads/profile_image/'),$newProfilePic);
            $user->image = $newProfilePic;
        }
        $user->save();

       

        $req->session()->flash('success','User Created Successfully');

        return redirect('/login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);

        $UserCredentials = $req->only('email','password');

        if(Auth::attempt($UserCredentials)){
            return redirect('/dashboard');
        }else{
            $req->session()->flash('error','Invalid Credentials');
            return redirect('/login');
        }
    }

    public function dashboard()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $jwelleryType_num = JwelleryType::count();
        $supplier_num = Supplier::count();
        $product_num = Product::count();
        $customer_num = Customer::count();
        $stock_num = Stock::count();
        return view('user.dashboard',compact('year','logo','jwelleryType_num','supplier_num','product_num','customer_num','stock_num'));
    }

    public function accessDenied()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.access_denied',compact('year','logo'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


    
}
