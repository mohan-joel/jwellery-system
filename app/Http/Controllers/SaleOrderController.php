<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JwelleryType;
use App\Models\Product;
use App\Models\SaleOrder;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SaleOrderController extends Controller
{
    //
    public function show()
    {
        $a = 1;
        $year = date('Y');
        $invoice_num = rand(10000000, 99999999);
        $jwelleryTypes = JwelleryType::all();
        $saleOrders = SaleOrder::with('jwelleryType','product','customer')->get();
        $customers = Customer::all();
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.sale_order',compact('year','invoice_num','jwelleryTypes','saleOrders','a','customers','logo'));
    }

    public function getProductName($id)
    {
        $products = Product::where('jwelleryType_id',$id)->get();
        return response()->json([
            'status'=>200,
            'data'=>$products,
        ]);
    }

    public function getMoreProduct($id)
    {
        $products = Product::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$products,
        ]);
    }

    public function add(Request $request)
    {
        $saleOrder = new SaleOrder();
        $saleOrder->invoice_num = $request->invoice_num;
        $saleOrder->date = $request->date;
        $saleOrder->customer_email = $request->email;
        $saleOrder->jwelleryType_id = $request->jwellery_type_id;
        $saleOrder->product_id = $request->product_id;
        $saleOrder->ordered_qty = $request->or_qty;
        $saleOrder->tax = $request->tax;
        $saleOrder->discount = $request->discount;
        $saleOrder->grand_total = $request->g_total;
        $saleOrder->save();
        if($request->name != '')
        {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->contact = $request->contact;
            $customer->address = $request->address;
            $customer->save();

        }

        $id=$request->productId;
        $product =  Product::find($id);
        $product->available_qty = $product->available_qty - $request->or_qty;
        $product->update();
       
        return redirect('/sale-order')->with('success','Sale Order Added Successfully');

    }

    public function delete(Request $request)
    {
        $id = $request->saleOrderId;
        $saleOrder = SaleOrder::find($id);
        $saleOrder->delete();
        return redirect('/sale-order')->with('success','Sale Order Deleted Successfully');
    }


    public function getSaleOrderDetail($id)
    {
        $saleOrder = SaleOrder::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$saleOrder,
        ]);
    }

    public function getJwelleryTypeDetails($id)
    {
        $product = Product::where('jwelleryType_id',$id)->get();
        return response()->json([
            'data'=>$product,
        ]);
    }

    public function getProductDetails($id)
    {
        $prod = Product::find($id);
        return response()->json([
            'data'=>$prod,
        ]);
    }


    public function updateSaleOrder(Request $request)
    {
        $id = $request->productId;
        $saleOrder = SaleOrder::find($id);
        $saleOrder->invoice_num = $request->invoice_num;
        $saleOrder->date = $request->date;
        $saleOrder->customer_email = $request->email;
        $saleOrder->jwelleryType_id = $request->jwellery_type_id;
        $saleOrder->product_id = $request->product_id;
        $saleOrder->tax = $request->tax;
        $saleOrder->discount = $request->discount;
        $saleOrder->grand_total = $request->grand_total;
        $saleOrder->update();
        return redirect('/sale-order')->with('success','Sale/Order Updated Successfully');
    }

    public function getCustomerDetail($id)
    {
        $customer = Customer::find($id);
        return response()->json([
            'data'=>$customer,
        ]);
    }


    public function getEditCustomerDetail($id)
    {
        $customer = Customer::find($id);
        return response()->json([
            'data'=>$customer,
        ]);
    }
}
