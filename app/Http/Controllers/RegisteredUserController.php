<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Mail\InvoiceMail;
use App\Package;
use App\User;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Stripe\Invoice;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Edit Profile step by step

    public function update_user_header(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:25'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required'],
            'age' => ['required'],
            'height' => ['required'],
            'location' => ['required'],
            'religion' => ['required'],
            'mothertongue' => ['required'],
            'occupation' => ['required'],
            'maritalstatus' => ['required'],
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['gender'] = $request->gender;
        $data['age'] = $request->age;
        $data['height'] = $request->height;
        $data['location'] = $request->location;
        $data['religion'] = $request->religion;
        $data['mothertongue'] = $request->mothertongue;
        $data['occupation'] = $request->occupation;
        $data['maritalstatus'] = $request->maritalstatus;

        $avatarUpload = request()->file('avatar');
        if ($avatarUpload) {
            $avatarName = time() . '.' . $avatarUpload->getClientOriginalExtension();
            $avatarPath = public_path('/frontend/images/users');
            $avatarUpload->move($avatarPath, $avatarName);
            $data['avatar'] = 'public/frontend/images/users/' . $avatarName;
            $user = User::find($id);
            $avatar = $user->avatar;
            if ($avatar) {
                unlink($avatar);
            }
            $update = User::where('id', '=', $id)->update($data);
            session()->flash('success', 'Your profile successfully updated');
            return Redirect()->route('viewProfile');
        } else {
            $update = User::where('id', '=', $id)->update($data);
            session()->flash('success', 'Your profile successfully updated');
            return Redirect()->route('viewProfile');
        }
    }

    //Edit Profile step by step

    public function update_user_delails(Request $request, $id)
    {
        $data = $request->validate([
            'details' => ['required', 'string', 'min:25', 'max:500'],
        ]);
        $data['details'] = $request->details;
        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }

    public function update_user_basics(Request $request, $id)
    {
        $data = $request->validate([
            'weight' => ['required'],
            'bodytype' => ['required'],
            'blood' => ['required'],
            'smoke' => ['required'],
            'complexion' => ['required'],
            'dob' => ['required'],
            'country' => ['required'],
            'grewup' => ['required'],
        ]);
        $data = array();
        $data['weight'] = $request->weight;
        $data['bodytype'] = $request->bodytype;
        $data['blood'] = $request->blood;
        $data['smoke'] = $request->smoke;
        $data['complexion'] = $request->complexion;
        $data['dob'] = $request->dob;
        $data['country'] = $request->country;
        $data['grewup'] = $request->grewup;

        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }

    public function update_user_education(Request $request, $id)
    {
        $data = $request->validate([
            'education' => ['required'],
            'university' => ['required'],
            'income' => ['required'],
            'workingwith' => ['required'],
            'profession' => ['required']
        ]);
        $data = array();
        $data['education'] = $request->education;
        $data['university'] = $request->university;
        $data['income'] = $request->income;
        $data['workingwith'] = $request->workingwith;
        $data['profession'] = $request->profession;

        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }

    public function update_user_family(Request $request, $id)
    {
        $data = $request->validate([
            'fatherstatus' => ['required'],
            'motherstatus' => ['required'],
            'brothers' => ['required'],
            'sisters' => ['required']
        ]);
        $data = array();
        $data['fatherstatus'] = $request->fatherstatus;
        $data['motherstatus'] = $request->motherstatus;
        $data['brothers'] = $request->brothers;
        $data['sisters'] = $request->sisters;

        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }

    public function update_user_contact(Request $request, $id)
    {
        $data = $request->validate([
            'userphone' => ['required'],
            'userfacebook' => ['required']
        ]);
        $data = array();
        $data['userphone'] = $request->userphone;
        $data['userfacebook'] = $request->userfacebook;

        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }

    public function update_gimage1(Request $request, $id)
    {
        $data = $request->validate([
            'gimage1' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = array();

        $avatarUpload = request()->file('gimage1');
        $avatarName = time() . '.' . $avatarUpload->getClientOriginalExtension();
        $avatarPath = public_path('/frontend/images/users');
        $avatarUpload->move($avatarPath, $avatarName);
        $data['gimage1'] = 'public/frontend/images/users/' . $avatarName;
        $user = User::find($id);
        $gimage1 = $user->gimage1;
        if ($gimage1) {
            unlink($gimage1);
        }
        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }
    public function update_gimage2(Request $request, $id)
    {
        $data = $request->validate([
            'gimage2' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = array();

        $avatarUpload = request()->file('gimage2');
        $avatarName = time() . '.' . $avatarUpload->getClientOriginalExtension();
        $avatarPath = public_path('/frontend/images/users');
        $avatarUpload->move($avatarPath, $avatarName);
        $data['gimage2'] = 'public/frontend/images/users/' . $avatarName;
        $user = User::find($id);
        $gimage2 = $user->gimage2;
        if ($gimage2) {
            unlink($gimage2);
        }
        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }
    public function update_gimage3(Request $request, $id)
    {
        $data = $request->validate([
            'gimage3' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = array();

        $avatarUpload = request()->file('gimage3');
        $avatarName = time() . '.' . $avatarUpload->getClientOriginalExtension();
        $avatarPath = public_path('/frontend/images/users');
        $avatarUpload->move($avatarPath, $avatarName);
        $data['gimage3'] = 'public/frontend/images/users/' . $avatarName;
        $user = User::find($id);
        $gimage3 = $user->gimage3;
        if ($gimage3) {
            unlink($gimage3);
        }
        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }
    public function update_gimage4(Request $request, $id)
    {
        $data = $request->validate([
            'gimage4' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = array();

        $avatarUpload = request()->file('gimage4');
        $avatarName = time() . '.' . $avatarUpload->getClientOriginalExtension();
        $avatarPath = public_path('/frontend/images/users');
        $avatarUpload->move($avatarPath, $avatarName);
        $data['gimage4'] = 'public/frontend/images/users/' . $avatarName;
        $user = User::find($id);
        $gimage4 = $user->gimage4;
        if ($gimage4) {
            unlink($gimage4);
        }
        $update = User::where('id', '=', $id)->update($data);
        session()->flash('success', 'Your profile successfully updated');
        return Redirect()->route('viewProfile');
    }

    public function viewProfile()
    {
        $user = User::where('id', Auth::id())->first();
        return view('frontend.pages.logged_user_profile', compact('user'));
    }

    public function detailsProfile($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::where('id', '=', $id)->first();
        $priority = User::where('id', '=', $id)->first();
        $value = ($priority->priority) + 1;
        User::where('id', $id)->update(['priority' => $value]);
        return view('frontend.pages.details_profile', compact('user'));
    }
    public function allMaleProfile()
    {
        $maleFeatured = User::orderBy('priority', 'desc')->get();
        return view('frontend.pages.all_male_profile', compact('maleFeatured'));
    }
    public function allFemaleProfile()
    {
        $maleFeatured = User::orderBy('priority', 'desc')->get();
        return view('frontend.pages.all_female_profile', compact('maleFeatured'));
    }
    public function testimonial(Request $request, $id)
    {
        $testimonial = User::findorfail($id);
        $testimonial->testimonial = $request->testimonial;
        $testimonial->save();
        session()->flash('success', 'Your feedback successfully accepted');
        return back();
    }

    //payment
    public function payment(Request $request)
    {
        $payment = $request->payment;
        if ($payment == 'paypal') {
            $package_price = Package::all();
            return view('frontend.pages.stripe',compact('package_price'));
        } elseif ($payment == 'mastercard') {
            echo "I am from master card";
        } elseif ($payment == 'visa') {
            echo "I am form visa card";
        }
        else{
            return redirect()->back();
        }
    }
    public function stripeCharge(Request $request)
    {
        $totalCharge = $request->totalCharge;
        $packagePrice = Package::where('price', $totalCharge)->first();

        $coupon = $request->coupon;

        if ($packagePrice) {
            // Set your secret key. Remember to switch to your live secret key in production!
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey('sk_test_3YMEwbMESG4wUJMyuWj8rxVF00LgfPi9hS');

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
            if($coupon){
                $coupon = Coupon::where('coupon', $coupon)->first();
                if(!$coupon){
                    session()->flash('danger', 'Your coupon is not valid');
                    return Redirect()->route('viewProfile');
                }
                $status = $coupon->coupon_status;
                $discount = $coupon->discount;
                if($status == 0){
                    session()->flash('danger', 'Your coupon is not valid');
                    return Redirect()->route('viewProfile');
                }
                else{
                    $charge = \Stripe\Charge::create([
                        'amount' => ($totalCharge * 100)-($discount*100),
                        'currency' => 'usd',
                        'description' => 'Zibonshathi Payment',
                        'source' => $token,
                        'metadata' => ['order_id' => '6735'],
                    ]);
                }
            }
            else {
                $charge = \Stripe\Charge::create([
                    'amount' => $totalCharge * 100,
                    'currency' => 'usd',
                    'description' => 'Zibonshathi Payment',
                    'source' => $token,
                    'metadata' => ['order_id' => '6735'],
                ]);
            }
        }
        else {
            session()->flash('danger', 'Select any package');
            return Redirect()->route('viewProfile');
        }
        $packageValid = $packagePrice->valid;
        if($packageValid){
            $id = Auth::user()->id;
            $email = Auth::user()->email;
            $name = Auth::user()->name;
            $package = $packageValid;

            $data = array();
            $data['payment_id'] = $charge->payment_method;
            $data['paying_amount'] = $charge->amount;
            $data['blnc_transection'] = $charge->balance_transaction;
            $data['payment_date'] = Carbon::now();
            $date = Carbon::now();
            $data['payment_exp'] = $date->addDay($packageValid);
            $update = User::where('id', '=', $id)->update($data);

            //Send Payment Invoice
            $post = new Invoice();
            $post->payment_date = Carbon::now();
            $post->payment_id = $charge->payment_method;
            $post->name = $name;
            $post->email = $email;
            $post->package = $package;
            if($discount){
                $post->discount = $discount;
            }
            $post->paying_amount = $charge->amount;

            Mail::to($email)->send(new InvoiceMail($post));
            session()->flash('success', 'Your payment successfully accepted');
            return Redirect()->route('viewProfile');
        }
         else {
            session()->flash('danger', 'Select any package');
            return Redirect()->route('viewProfile');
        }
    }

    //For Admin panel
    function index()
    {
        $registeredUser = User::all();
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            return view('backend.registered_user.registered_user', compact('registeredUser'));
        }
        return Redirect()->route('home');
    }
    function active($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $changeValue = User::where('id', $id)->update(['status' => 1]);
            session()->flash('success', 'User successsfully activated');
            return back();
        }
        return Redirect()->route('home');
    }
    function deactive($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $changeValue = User::where('id', $id)->update(['status' => 0]);
            session()->flash('danger', 'User successsfully deactivated');
            return back();
        }
        return Redirect()->route('home');
    }
    public function pendingUser()
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $pendingUser = User::all();
            return view('backend.registered_user.pending_user', compact('pendingUser'));
        }
        return Redirect()->route('home');
    }
    public function registeredGardian()
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $registeredGardian = User::all();
            return view('backend.registered_user.registered_guardian', compact('registeredGardian'));
        }
        return Redirect()->route('home');
    }
    function approveUser($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $changeValue = User::where('id', $id)->update(['pending' => 1]);
            session()->flash('success', 'User successsfully approved');
            return back();
        }
        return Redirect()->route('home');
    }

    public function registeredUserView($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $registeredUser = User::where('id', $id)->first();
            return view('backend.registered_user.view_user', compact('registeredUser'));
        }
        return Redirect()->route('home');
    }

    public function pendingUserView($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $registeredUser = User::where('id', $id)->first();
            return view('backend.registered_user.view_user', compact('registeredUser'));
        }
        return Redirect()->route('home');
    }

    public function registeredUserDelete($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $user = User::find($id);
            $avatar = $user->avatar;
            if ($avatar) {
                unlink($avatar);
            }
            $user->delete();
            session()->flash('danger', 'User successsfully deleted');
            return Redirect()->back();
        }
        return Redirect()->route('home');
    }
    public function pendingUserDelete($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $user = User::find($id);
            $user->delete();
            session()->flash('danger', 'User successsfully deleted');
            return Redirect()->back();
        }
        return Redirect()->route('home');
    }
    public function registeredGardianDelete($id)
    {
        if (Auth::user()->user_type == 1 || Auth::user()->user_type == 2) {
            $user = User::find($id);
            $user->delete();
            session()->flash('danger', 'User successsfully deleted');
            return Redirect()->back();
        }
        return Redirect()->route('home');
    }
}
