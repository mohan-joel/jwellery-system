<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\SaleOrder;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function show()
    {
        $a =1;
        $year = date('Y');
        $customers = Customer::all();
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.customer',compact('a','year','customers','logo'));
    }

    public function showCustomersBill($id)
    {
        $saleOrder = SaleOrder::find($id);
        $uid = Auth::User()->id;
        $shop = Shop::find($uid);
        return view('user.customer_bill',compact('saleOrder','shop'));
    }
}
