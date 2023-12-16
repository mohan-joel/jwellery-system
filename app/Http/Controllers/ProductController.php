<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JwelleryType;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Picqer;

class ProductController extends Controller
{
    //
    public function show()
    {
        $a=1;
        $year = date('Y');
        $jwelleryTypes = JwelleryType::all();
        $products = Product::with('jwelleryType')->paginate(5);
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.product',compact('year','jwelleryTypes','a','products','logo'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_name'=>'required|string',
            'jwellery_type'=>'required|integer',
        ]);

       

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->jwelleryType_id = $request->jwellery_type;
        $product->save();
        return redirect('/product')->with('success','Product Inserted Successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$product,
        ]);
    }

    public function update(Request $request)
    {
        $pid = $request->product_id;
        $product = Product::find($pid);
        $product->product_name = $request->product_name;
        $product->jwelleryType_id = $request->jwellery_type;
        $product->update();
        return redirect('/product')->with('success','Product Updated Successfully');
    }

    public function searchProduct(Request $request)
    {
        $a=1;
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $jwelleryTypes = JwelleryType::all();
        $product = $request->product;
        $products = Product::where('product_name','like','%'.$product.'%')->get();
        return view('user.product',compact('a','year','logo','products','jwelleryTypes'));
    }

    public function findProductInStock($id)
    {
        $a=1;
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $jwellery_type_name = JwelleryType::find($id);
        $sum_netWt = Stock::where('jwellerytype_id',$id)->sum('net_wt');
        $sum_grossWt = Stock::where('jwellerytype_id',$id)->sum('gross_wt');
        $sum_stoneWt = Stock::where('jwellerytype_id',$id)->sum('stone_wt');
        $product = Stock::where('jwellerytype_id',$id)->with('product')->get();
        return view('user.product_list_in_stock',compact('a','year','logo','product','sum_netWt','sum_grossWt','sum_stoneWt','jwellery_type_name'));
    }
   
}
