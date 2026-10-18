<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Codeboxr\CouponDiscount\Facades\Coupon;
use Codeboxr\CouponDiscount\Models\Coupon as CouponCode;
use Brian2694\Toastr\Facades\Toastr;
use \Carbon\Carbon;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $show_data = Coupon::list()->get();
        // dd($show_data);
        return view('backEnd.coupon.index',compact('show_data'));
    }

    public function create()
    {
        return view('backEnd.coupon.create');
    }

    public function store(Request $request)
    {
        // dd($request);

        $this->validate($request, [
            'coupon_code' => 'required',
            'discount_type' => 'required',
            'discount_amount' => 'required',
            'end_date' => 'required',
            // 'status' => 'required',
        ]);


        Coupon::add([
            'coupon_code'       => $request->coupon_code, // (required) Coupon code
            'discount_type'     => $request->discount_type, // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
            'discount_amount'   => $request->discount_amount, // (required) discount amount or percentage value
            'start_date'        => Carbon::today()->toDateString(), // (required) coupon start date
            'end_date'          => $request->end_date, // (required) coupon end date
            'status'            => $request->status==1?1:0, // (required) two status are accepted. (for active 1 
        ]);

        Toastr::success('Success','Data insert successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = CouponCode::find($id);
        return view('backEnd.coupon.edit',compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'coupon_code' => 'required',
            'discount_type' => 'required',
            'discount_amount' => 'required',
            'end_date' => 'required',
            // 'status' => 'required',
        ]);

        Coupon::update([
            'coupon_code'       => $request->coupon_code, // (required) Coupon code
            'discount_type'     => $request->discount_type, // (required) coupon discount type. two type are accepted (1. percentage and 2. fixed)
            'discount_amount'   => $request->discount_amount, // (required) discount amount or percentage value
            'start_date'        => Carbon::today()->toDateString(), // (required) coupon start date
            'end_date'          => $request->end_date, // (required) coupon end date
            'status'            => $request->status==1?1:0, // (required) two status are accepted. (for active 1 
        ], $request->coupon_id);

        Toastr::success('Success','Data update successfully');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $delete_data = CouponCode::find($request->coupon_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
