<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JwelleryType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JwelleryTypeController extends Controller
{
    //
    public function show()
    {
        $a=1;
        $jwelleryTypes = JwelleryType::paginate(5);
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        return view('user.jwellery-type',compact('year','jwelleryTypes','a','logo'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'jwellery_type_name'=>'required|string',
        ]);

        $jwelleryType = new JwelleryType();
        $jwelleryType->jwellery_type_name = $request->jwellery_type_name;
        $jwelleryType->save();
        return redirect('/jwellery-type')->with('success','Jwellery Type Added Successfully');
    }

    public function update(Request $request)
    {
        $jwelleryType = JwelleryType::find($request->id);
        $jwelleryType->jwellery_type_name = $request->jwellery_type_name;
        $jwelleryType->update();
        return response()->json(['message','Updated Successfully']);
    }

    public function delete(Request $request)
    {
        $id = $request->jid;
        $jwelleryType = JwelleryType::find($id);
        $jwelleryType->delete();
        return redirect('/jwellery-type')->with('success','Jwellery Type Deleted Successfully');
    }

    public function search(Request $request)
    {
        $a=1;
        $year = date('Y');
        $uid = Auth::user()->id;
        $logo = DB::table('shops')->where('user_id',$uid)->value('shop_logo');
        $jwellerytype = $request->jwelleryType;
        $jwelleryTypes = JwelleryType::where('jwellery_type_name','like','%'.$jwellerytype.'%')->get();
        return view('user.jwellery-type',compact('a','year','jwelleryTypes','logo'));
    }
}
