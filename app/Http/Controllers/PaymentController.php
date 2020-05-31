<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function userPayment(){
        if (Auth::user()->user_type == 1) {
            $payment = User::where('payment_id', '!=', ' ')->get();
            return view('backend.payment',compact('payment'));
        }
        return Redirect()->route('home');
    }

    public function paymentDelete($id){
        if (Auth::user()->user_type == 1) {
            $changeValue = User::where('id',$id)->update(['payment_id'=>"NULL", 'paying_amount'=>"NULL", 'blnc_transection'=>"NULL", 'blnc_transection'=>"NULL", 'payment_date'=>"NULL", 'payment_exp'=>"NULL"]);
            return back();
        }
        return Redirect()->route('home');
    }
}
