<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Service;
use App\User;
use App\VisitorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnyController extends Controller
{

    function index(){
        $UserIP = VisitorModel::get_ip();
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        $getbrowser = VisitorModel::get_browsers();
        $getdevice = VisitorModel::get_device();
        $getos = VisitorModel::get_os();

        $ip_address = VisitorModel::where('ip_address', $UserIP)->first();

        if(!$ip_address){
            VisitorModel::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate, 'getbrowser' => $getbrowser, 'getdevice' => $getdevice, 'getos' => $getos]);
        }
        // else{
        //     VisitorModel::where('ip_address',$ip_address)->update(['visit_time'=>$timeDate]);
        // }

        $maleFeatured = User::where('gender', '=', 'Male')->where('user_type', '=', '0')->limit(4)->orderBy('priority','desc')->get();
        $femaleFeatured = User::where('gender', '=', 'Female')->where('user_type', '=', '0')->limit(4)->orderBy('priority','desc')->get();
        $service = Service::limit(4)->get();
        $testimonial = User::where('testimonial', '!=', NULL)->limit(2)->get();
        $blog = Blog::all();

    return view('home', compact('maleFeatured','service','blog','femaleFeatured','testimonial'));
    }

    function aboutus(){
        return view('frontend.pages.aboutus');
    }
    function privacy_policy(){
        return view('frontend.pages.privacy_policy');
    }
    function termsof_us(){
        return view('frontend.pages.termsof_us');
    }
    function premium_membership(){
        return view('frontend.pages.premium_membership');
    }
    function partner_search_policy(){
        return view('frontend.pages.partner_search_policy');
    }
    function helpdesk(){
        return view('frontend.pages.helpdesk');
    }

}
