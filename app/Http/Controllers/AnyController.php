<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Service;
use App\User;
use App\VisitorModel;
use Illuminate\Http\Request;

class AnyController extends Controller
{

    function index(){
        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate]);
        $maleFeatured = User::where('gender', '=', 'Male')->where('user_type', '=', '0')->limit(4)->get();
        $femaleFeatured = User::where('gender', '=', 'Female')->where('user_type', '=', '0')->limit(4)->get();
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
    function partner_search_policy(){
        return view('frontend.pages.partner_search_policy');
    }
    function helpdesk(){
        return view('frontend.pages.helpdesk');
    }
}
