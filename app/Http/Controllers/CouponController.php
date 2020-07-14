<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function addcoupon(Request $request){
        $post = $request->validate([
            'coupon' => ['required', 'min:5', 'max:25'],
            'discount' => ['required'],
        ]);
        $post = new Coupon();
        $post->coupon = $request->coupon;
        $post->discount = $request->discount;
        $post->save();
        session()->flash('success','Successsfully coupon added');
        return Redirect()->back();
    }
    function couponActive($id){
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $changeValue = Coupon::where('id',$id)->update(['coupon_status'=>1]);
            session()->flash('success','Successsfully Coupon Activated');
            return back();
        }
        return Redirect()->route('home');
    }
    function couponDeactive($id){
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $changeValue = Coupon::where('id',$id)->update(['coupon_status'=>0]);
            session()->flash('danger','Successsfully Coupon Deactivated');
            return back();
        }
        return Redirect()->route('home');
    }
    public function couponDelete($id){
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $service = Coupon::where('id',$id)->delete();
            session()->flash('danger','Successsfully Coupon deleted');
            return back();
        }
        return Redirect()->route('home');
    }
}
