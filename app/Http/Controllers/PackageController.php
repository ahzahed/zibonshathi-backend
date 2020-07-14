<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public Function index(){
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
        $package = Package::all();
        $coupon = Coupon::all();
        return view('backend.package_n_coupon.package',compact('package','coupon'));
        }
        return Redirect()->route('home');
    }

    public function packageUpdate(Request $request,$id){
        $post = Package::findorfail($id);
        $post->price = $request->price;
        $post->save();
        session()->flash('success','Successsfully package updated');
        return Redirect()->back();
    }
   

}
