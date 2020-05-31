<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Service;
use App\Testimonial;
use App\User;
use App\VisitorModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate]);
        // $maleFeatured = json_decode(DB::table('users')->get());
        $maleFeatured = User::where('gender', '=', 'Male')->where('user_type', '=', '0')->limit(4)->get();
        $femaleFeatured = User::where('gender', '=', 'Female')->where('user_type', '=', '0')->limit(4)->get();
        $service = Service::limit(4)->get();
        $testimonial = User::where('testimonial', '!=', ' ')->limit(2)->get();
        $blog = Blog::all();

        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            return view('admin');
        } else {
            return view('home', compact('maleFeatured', 'service', 'blog', 'femaleFeatured', 'testimonial'));
        }
    }

    public function search(Request $request)
    {
        $ageFrom = $request->ageFrom;
        $ageTo = $request->ageTo;
        $gender = $request->gender;
        $religion = $request->religion;
        $country = $request->country;

        $users = User::whereBetween('age', array($ageFrom, $ageTo))
            ->orWhere('gender', '=', $gender)
            ->orWhere('religion', '=', $religion)
            ->orWhere('country', '=', $country)
            ->get();
        return view('frontend.pages.searched_user', compact('users'));
    }


}
