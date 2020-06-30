<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Service;
use App\Testimonial;
use App\User;
use App\VisitorModel;
use Carbon\Carbon;
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
        $ip_address = VisitorModel::where('ip_address', $UserIP)->first();

        if(!$ip_address){
            VisitorModel::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate]);
        }

        // $maleFeatured = json_decode(DB::table('users')->get());
        $maleFeatured = User::where('gender', '=', 'Male')->where('user_type', '=', '0')->limit(4)->orderBy('priority','desc')->get();
        $femaleFeatured = User::where('gender', '=', 'Female')->where('user_type', '=', '0')->limit(4)->orderBy('priority','desc')->get();
        $service = Service::limit(4)->get();
        $testimonial = User::where('testimonial', '!=', NULL)->limit(2)->get();
        $blog = Blog::all();

        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {

            $male = User::where('gender', '=', 'Male')->get();
            $female = User::where('gender', '=', 'Female')->get();
            $parents = User::where('user_type', '=', 5)->get();
            $active = User::where('status', '=', 1)->get();
            $pending = User::where('status', '=', 0)->where('user_type', '=', 0)->get();
            $payment = User::where('payment_id', '!=', NULL)->get();
            $payment_exp = User::where('payment_exp', '!=', NULL)->where('payment_exp', '<', Carbon::now())->get();
            $payment_act = User::where('payment_exp', '!=', NULL)->where('payment_exp', '>', Carbon::now())->get();

            $male=$male->count();
            $female=$female->count();
            $parents=$parents->count();
            $active=$active->count();
            $pending=$pending->count();
            $payment=$payment->count();
            $payment_exp=$payment_exp->count();
            $payment_act=$payment_act->count();

            return view('admin', compact('male', 'female', 'parents', 'active', 'pending', 'payment', 'payment_exp', 'payment_act'));
        } else {
            return view('home', compact('maleFeatured', 'service', 'blog', 'femaleFeatured', 'testimonial'));
        }
    }

    //Multi Search
    public function search(Request $request)
    {
        $gender = $request->gender;
        $ageFrom = $request->ageFrom;
        $ageTo = $request->ageTo;
        $religion = $request->religion;
        $country = $request->country;

        if (($gender == "Male" && $ageFrom && $ageTo && $religion && $country) || ($gender == "Female" && $ageFrom && $ageTo && $religion && $country)) {
            $users = User::whereBetween('age', array($ageFrom, $ageTo))
            ->where('gender', '=', $gender)
            ->where('religion', '=', $religion)
            ->where('country', '=', $country)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if(($gender == "Male" && $ageFrom && $ageTo && $religion) || ($gender == "Female" && $ageFrom && $ageTo && $religion)){
            $users = User::whereBetween('age', array($ageFrom, $ageTo))
            ->where('gender', '=', $gender)
            ->where('religion', '=', $religion)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if(($gender == "Male" && $ageFrom && $ageTo) || ($gender == "Female" && $ageFrom && $ageTo)){
            $users = User::whereBetween('age', array($ageFrom, $ageTo))
            ->where('gender', '=', $gender)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if(($gender == "Male" && $religion && $country) || ($gender == "Female" && $religion && $country)){
            $users = User::where('country', '=', $country)
            ->where('gender', '=', $gender)
            ->where('religion', '=', $religion)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if(($gender == "Male" && $religion) || ($gender == "Female" && $religion)){
            $users = User::where('gender', '=', $gender)
            ->where('religion', '=', $religion)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if(($gender == "Male" && $country) || ($gender == "Female" && $country)){
            $users = User::where('country', '=', $country)
            ->where('gender', '=', $gender)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if($ageFrom && $ageTo){
            $users = User::whereBetween('age', array($ageFrom, $ageTo))->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if($religion){
            $users = User::where('religion', '=', $religion)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if($country){
            $users = User::where('country', '=', $country)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
        else if(($gender == "Male") || ($gender == "Female")){
            $users = User::where('gender', '=', $gender)->get();
            if(count($users) != 0){
                return view('frontend.pages.searched_user', compact('users'));
            }else{
                return view('frontend.pages.not_found');
            }
        }
    }
}
