<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //
    public function show()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $shop = Shop::find($uid);
        $uid = Auth::user()->id;
        $shopDetails = Shop::first();
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.shop',compact('year','shop','logo','shopDetails'));
    }

    public function addShopDetails(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'address'=>'required|string',
            'contact'=>'required|string',
            'shop_logo'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $shop = new Shop();
        $shop->user_id = $request->user_id;
        $shop->shop_name = $request->name;
        $shop->shop_address = $request->address;
        $shop->shop_contact = $request->contact;
        if($request->file('shop_logo')->isValid()){
            $shopLogo = $request->file('shop_logo');
            $newShopLogo = $request->file('shop_logo')->getClientOriginalName();
            $shopLogo->move(public_path('uploads/shop_logo/'), $newShopLogo);

            $shop->shop_logo = $newShopLogo;
           
        }
        $shop->save();
        return redirect('/shop-details')->with('success','Shop Details Added Successfully');
    }

    public function updateShop(Request $request, Shop $shopDetails)
    {
        $request->validate([
            'name'=>'required|string',
            'address'=>'required|string',
            'contact'=>'required|string',
            'shop_logo'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->file('shop_logo')->isValid()){
            $shopLogo = $request->file('shop_logo');
            $newShopLogo = $request->file('shop_logo')->getClientOriginalName();
            $shopLogo->move(public_path('uploads/shop_logo/'), $newShopLogo);
   
        }

        $shopDetails = Shop::find($request->user_id);
        $shopDetails->user_id = $request->user_id;
        $shopDetails->shop_name = $request->name;
        $shopDetails->shop_address = $request->address;
        $shopDetails->shop_contact = $request->contact;
        $shopDetails->shop_logo = $newShopLogo;

        $shopDetails->update();
        return redirect('/shop-details')->with('success','Shop Details Updated Successfully');

    }

}
