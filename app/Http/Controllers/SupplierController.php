<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    //
    public function show()
    {
        $a = 1;
        $year = date('Y');
        $suppliers = Supplier::paginate(5);
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.supplier',compact('year','suppliers','a','logo'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'supplier_name'=>'required|string',
            'supplier_email'=>'required|email',
            'supplier_contact'=>'required|string',
            'supplier_address'=>'required|string'
        ]);

        $supplier = new Supplier();
        $supplier->fullname = $request->supplier_name;
        $supplier->email = $request->supplier_email;
        $supplier->contact = $request->supplier_contact;
        $supplier->address = $request->supplier_address;
        $supplier->save();
        
        return redirect('/suppliers')->with('success','Supplier Added Successfully');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$supplier,
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->sid;
        $supplier = Supplier::find($id);
        $supplier->fullname = $request->supplier_name;
        $supplier->email = $request->supplier_email;
        $supplier->contact = $request->supplier_contact;
        $supplier->address = $request->supplier_address;
        $supplier->update();
        return redirect('/suppliers')->with('success','Supplier Updated Successfully');
    }

    public function delete(Request $request)
    {
        $id = $request->sid;
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('/suppliers')->with('success','Supplier Deleted Successfully');
    }


    public function searchSupplier(Request $request)
    {
        $a = 1;
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $supplier = $request->supplier;
        $suppliers = Supplier::where('fullname','like','%'.$supplier.'%')->get();
        return view('user.supplier',compact('a','year','supplier','suppliers','logo'));
    }
}
