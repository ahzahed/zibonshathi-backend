<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $male = User::where('gender', '=', 'Male')->get();
            $female = User::where('gender', '=', 'Female')->get();
            $active = User::where('status', '=', 1)->get();
            $pending = User::where('status', '=', 0)->where('user_type', '=', 0)->get();
            $payment = User::where('payment_id', '!=', NULL)->get();

            $male=$male->count();
            $female=$female->count();
            $active=$active->count();
            $pending=$pending->count();
            $payment=$payment->count();

            return view('backend.dashboard',compact('male','female','active','pending','payment'));
        }
    }
}
