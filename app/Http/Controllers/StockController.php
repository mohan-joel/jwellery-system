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
        $stocks = Stock::with('jwelleryType','product','supplier')->paginate(5);
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $sum_netWt = Stock::sum('net_wt');
        $sum_grossWt = Stock::sum('gross_wt');
        $sum_stoneWt = Stock::sum('stone_wt');
        return view('user.stock',compact('year','suppliers','jwelleryTypes','stocks','a','logo','sum_netWt','sum_grossWt','sum_stoneWt'));
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
        $stock->date = date('Y-m-d');
        $stock->supplier_email = $request->supplier_email;
        $stock->jwelleryType_id = $request->jwellery_type_id;
        $stock->product_id = $request->product_id;
        $stock->net_wt = $request->net_wt;
        $stock->gross_wt = $request->gross_wt;
        $stock->price = $request->price;
        $stock->serial_num = $request->serial_num;
        $stock->stone_wt = $request->stone_wt;
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

    public function showSaleBySerialNumPage()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.saleBySerialNum',compact('year','logo'));

    }

    public function sellBySerialNum(Request $request)
    {
        $serialNum = $request->serial_num;
        $stock = Stock::where('serial_num',$serialNum)->first();

        if ($stock) {
            // Save the values before deleting the record
            $jwelleryType_id = $stock->jwelleryType_id;
            $product_id = $stock->product_id;
            $net_wt = $stock->net_wt;
            $gross_wt = $stock->gross_wt;
            $stone_wt = $stock->stone_wt;
            $price = $stock->price;
    
            // Delete the record
            $stock->delete();
    
            // Create a new record using the saved values
            ProductSold::create([
                'jwelleryType_id'=> $stock->jwelleryType_id,
                'product_id'=>$stock->product_id,
                'net_wt'=>$stock->net_wt,
                'gross_wt'=>$stock->gross_wt,
                'stone_wt'=>$stock->stone_wt,
                'price'=>$stock->price,
            ]);
    
            // Additional logic...
    
            return redirect()->back()->with('success', 'Product Sold');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }

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

    public function showTestBarcode()
    {
        $products = Stock::all();
        return view('user.testBarcode',compact('products'));
    }


    public function showSoldProduct()
    {
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $soldProduct = ProductSold::with('jwelleryType','product')->paginate(10);
        return view('user.sold_product',compact('soldProduct','year','logo'));
    }


    public function getProductByBarcode($barcode)
    {
        try {
            // Your code here
           

            $product = Stock::with('jwelleryType','product')->where('product_code', $barcode)->first();
            $product->delete();
    

            if($product){
                ProductSold::create([
                    'jwelleryType_id'=> $product->jwelleryType_id,
                    'product_id'=>$product->product_id,
                    'net_wt'=>$product->net_wt,
                    'gross_wt'=>$product->gross_wt,
                    'stone_wt'=>$product->stone_wt,
                    'price'=>$product->price,
                ]);
            }

            return response()->json([
                'data'=>$product,
                'msg'=>'Product is Sold'
            ]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
       
    }

    public function getSerialNums()
    {
        $serialNum = Stock::pluck('serial_num');
        return response()->json([
            'data'=>$serialNum,
        ]);
    }

    public function getAllJwelleryType()
    {
        $allJwelleryType = JwelleryType::all();
        return response()->json([
            'data'=>$allJwelleryType,
        ]);
    }

   
}
