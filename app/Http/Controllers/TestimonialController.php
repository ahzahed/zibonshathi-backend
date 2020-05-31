<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function testimonial(){
        if (Auth::user()->user_type == 1 && Auth::user()->user_type == 2) {
            $testimonial = User::where('testimonial', '!=', NULL)->get();
            return view('backend.testimonial',compact('testimonial'));
        }
        return Redirect()->route('home');
    }
    public function testimonialDelete($id){
        if (Auth::user()->user_type == 1 && Auth::user()->user_type == 2) {
            $changeValue = User::where('id',$id)->update(['testimonial'=>NULL]);
            return back();
        }
    }
}
