<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\JwelleryType;
use App\Models\Product;
use App\Models\Stock;
use App\Models\ProductSold;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Picqer;

class StockController extends Controller
{
    //
    public function show()
    {
        $a = 1;
        $year = date('Y');
        $suppliers = Supplier::all();
        $jwelleryTypes = JwelleryType::all();
        $stocks = Stock::with('jwelleryType','product','supplier')->get();
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.stock',compact('year','suppliers','jwelleryTypes','stocks','a','logo'));
    }

    public function getSuppliersInfo($id)
    {
        $suppliers = Supplier::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$suppliers,
        ]);
    }

    public function getProductDetails($id)
    {
        $products = Product::where('jwelleryType_id',$id)->get();
        return response()->json([
            'status'=>200,
            'data'=>$products,
        ]);
    }

    public function getMoreProductDetails($id)
    {
        $moreProducts = Product::find($id);
        return response()->json([
            'data'=>$moreProducts,
        ]);
    }

    public function addStockDetails(Request $request)
    {
        $stock = new Stock();
        $stock->date = $request->date;
        $stock->supplier_email = $request->supplier_email;
        $stock->jwelleryType_id = $request->jwellery_type_id;
        $stock->product_id = $request->product_id;
        $stock->net_wt = $request->net_wt;
        $stock->gross_wt = $request->gross_wt;
        $stock->price = $request->price;
        $product_code = mt_rand(11111,99999);
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($product_code,
                $generator::TYPE_STANDARD_2_5,2,60);
        $stock->product_code = $product_code;
        $stock->barcode = $barcode;
        $stock->save();

        if($request->supplier_name){
            $supplier = new Supplier();
            $supplier->fullname = $request->supplier_name;
            $supplier->email = $request->supplier_email;
            $supplier->contact = $request->supplier_contact;
            $supplier->address = $request->supplier_address;
            $supplier->save();
        }

        return redirect('/stocks')->with('success','Stock Added Successfully');
    }


    public function showFromBCR($barcode)
    {

        //dynamic year 
        $year = date('Y');
        //retrieving logo of shop 
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');

       

        //query the database to product with scanned barcode
        $products = Stock::with('jwelleryType','product')->where('product_code',$barcode)->first();

        if($products->quantity > 1)
        {
            $products->quantity = $products->quantity - 1;
            $products->update();
            ProductSold::create($products->toArray());
        }elseif($products->quantity == 1)
        {
            ProductSold::create($products->toArray());
            $products->delete();
        }

         return redirect('/scan-info')->with('success','Product is sold');
        
    }

    public function showInputPage()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.scanToInput',compact('year','logo'));
    }

    public function inputFromBCR($barcode)
    {
        //dynamic year 
        $year = date('Y');
        //retrieving logo of shop 
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');

       

        //query the database to product with scanned barcode
        $products = Stock::with('jwelleryType','product')->where('product_code',$barcode)->first();

        $products->quantity = $products->quantity + 1;
        $products->update();

        
       
         return redirect('/add-product-in-stock')->with('success','Product is added');
    }


    public function showScanInfo()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');

        return view('user.scanInfo',compact('year','logo'));
    }


    public function getStockDetails($id)
    {
        $stock = Stock::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$stock,
        ]);
    }


    public function updateStockDetails(Request $request)
    {
        $id = $request->stock_id;
        $stock = Stock::find($id);
        $stock->date = $request->date;
        $stock->supplier_id = $request->supplier_id;
        $stock->jwelleryType_id = $request->jwellery_type_id;
        $stock->product_id = $request->product_id;
        $stock->added_qty = $request->rq_qty;
        $stock->tax = $request->tax;
        $stock->discount = $request->discount;
        $stock->grand_total = $request->g_total;
        $stock->update();
        return redirect('/stocks')->with('success','Stock Updated Successfully');
    }

    public function delete(Request $request)
    {
        $id = $request->stockId;
        $stock = Stock::find($id);
        $stock->delete();
        return redirect('/stocks')->with('success','Stock Deleted Successfully');
    }

    public function searchStock(Request $request)
    {
        $a = 1;
        $year = date('Y');
        $uid = Auth::user()->id;
        $jwelleryTypes = JwelleryType::all();
        $suppliers = Supplier::all();
        $date = $request->date;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $stocks = Stock::where('date','like','%'.$date.'%')->get();
        return view('user.stock',compact('a','year','logo','stocks','suppliers','jwelleryTypes'));
    }

    public function showAllBarcodes()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $products = Stock::all();
        return view('user.barcode',compact('products','logo','year'));
    }

    public function showEachStockInfo($id)
    {
        $barcode = Stock::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$barcode,
        ]);
    }


    public function showSoldProduct()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $soldProduct = ProductSold::with('jwelleryType','product')->get();
        return view('user.sold_product',compact('soldProduct','year','logo'));
    }
}
