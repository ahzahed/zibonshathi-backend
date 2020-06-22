@extends('frontend.app')
<link rel="stylesheet" href="{{ asset('public/frontend/css/userProfile.css') }}" />
@include('frontend.menu')
<div class="container">
    @if (session()->has('success'))
    <div class="row">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span
                    class="border ml-5 bg-success p-2">&times;</span></button>{{ session()->get('success') }}
        </div>
    </div>
    @elseif (session()->has('danger'))
    <div class="row">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span
                    class="border ml-5 bg-danger p-2">&times;</span></button>{{ session()->get('danger') }}
        </div>
    </div>
    @endif
</div>
@if (Auth::user()->user_type=="0")
<!-- View Profile Part Start -->
<section id="v-profile">
    <div class="container">
        <div class="row">
            {{--  Update header part  --}}
            <div class="col-lg-12">
                <div class="v-pro-body">
                    <div class="row">
                        <div class="col-lg-2 col-8 mx-auto col-sm-4 col-md-3">
                            <div class="pro-img">
                                <img src="{{ asset($user->avatar) }}" alt="img" style="height: 120px;" class="w-100">
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-8 col-md-7">
                            <div class="pro-content">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6><strong>Name : </strong>{{ $user->name }}</h6>
                                        <h6><strong>Email : </strong>{{ $user->email }}</h6>
                                        <h6>
                                            <span><strong>Gender : </strong>{{ $user->gender }}</span>
                                            <span><strong>Age : </strong>{{ $user->age }}</span>
                                            <span><strong>Height : </strong>{{ $user->height }}</span>
                                        </h6>
                                        <h6><strong>Location: </strong>{{ $user->location }}</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6><strong>Religion : </strong>{{ $user->religion }}</h6>
                                        <h6><strong>Mother Tongue : </strong>{{ $user->mothertongue }}</h6>
                                        <h6><strong>Occupation : </strong>{{ $user->occupation }}</h6>
                                        <h6><strong>Marital Status : </strong>{{ $user->maritalstatus }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 p-0 col-sm-12 col-md-2">
                            <div class="cmn-btn">
                                <a class="btn btn-primary" role="button" data-toggle="modal"
                                    data-target="#editHeadInformation">Edit</a>
                                <a class="btn btn-primary" role="button" data-toggle="modal"
                                    data-target="#feedback">Feedback</a>
                                <a class="btn btn-primary mt-1" role="button" data-toggle="modal"
                                    data-target="#paymentAndStatus">Payment Status</a>
                                @if ($user->payment_exp < Carbon\Carbon::now()) <a type="button" class="btn btn-primary"
                                    role="button" data-toggle="modal" data-target="#contactUser">Pay Now</a>
                                    @endif
                                    <a class="btn btn-primary mt-1" href="{{ route('password.request') }}"
                                        role="button">Change Password</a>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            {{--  Edit details  --}}
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Personality, Family Details, Career, Partner Expectations etc.</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">
                                            {{--  <a href="{{ url('editDetails') }}" role="button">Edit</a> --}}
                                            <a href="#" role="button" data-toggle="modal"
                                                data-target="#editPersonality">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="border-btm">{{ $user->details }}</p>
                            </div>

                            {{--  Edit Basics & Lifestyle  --}}
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Basics & Lifestyle</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">
                                            <a href="#" role="button" data-toggle="modal"
                                                data-target="#basicLifeStyle">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-btm"></div>
                                <div class="row">
                                    <div class="col-lg-6 col-12 col-sm-6">
                                        <div class="basics">
                                            <h5><strong>Date of Birth : </strong>{{ $user->dob }}</h5>
                                            <h5><strong>Body Weight : </strong>{{ $user->weight }}</h5>
                                            <h5><strong>Blood : </strong>{{ $user->blood }}</h5>
                                            <h5><strong>Grew up in : </strong>{{ $user->grewup }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12 col-sm-6">
                                        <div class="basics ml-btm">
                                            <h5><strong>Smoke : </strong>{{ $user->smoke }}</h5>
                                            <h5><strong>Body Type : </strong>{{ $user->bodytype }}</h5>
                                            <h5><strong>Complexion : </strong>{{ $user->complexion }}</h5>
                                            <h5><strong>Current Country : </strong>{{ $user->country }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  Family Details  --}}
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Family Details</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">
                                            <a href="#" role="button" data-toggle="modal"
                                                data-target="#familyDetails">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-btm"></div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="basics">
                                            <h5><strong>Father's Status : </strong>{{ $user->fatherstatus }}</h5>
                                            <h5><strong>Mother's Status : </strong>{{ $user->motherstatus }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="basics ml-btm">
                                            <h5><strong>No. of Brothers : </strong>{{ $user->brothers }}</h5>
                                            <h5><strong>No. of Sisters : </strong>{{ $user->sisters }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  Education and Career  --}}
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Education & Career</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">
                                            <a href="#" role="button" data-toggle="modal"
                                                data-target="#educationAnCareer">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-btm"></div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="basics">
                                            <h5><strong>Education : </strong>{{ $user->education }}</h5>
                                            <h5><strong>University : </strong>{{ $user->university }}</h5>
                                            <h5><strong>Annual Income : </strong>{{ $user->income }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="basics ml-btm">
                                            <h5><strong>Working With : </strong>{{ $user->workingwith }}</h5>
                                            <h5><strong>Profession : </strong>{{ $user->profession }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  Contact Information  --}}
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Only Paid Member Will Be Able To See This</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">
                                            <a href="#" role="button" data-toggle="modal"
                                                data-target="#contactForPaidUsers">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-btm"></div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="basics">
                                            <h5><strong>Phone Number : </strong>{{ $user->userphone }}</h5>
                                            <h5><strong>Facebook Link : </strong>{{ $user->userfacebook }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- View Profile Part End -->
@endif


@if (Auth::user()->user_type=="5")
<!-- View Profile Part Start -->
<section id="v-profile">
    <div class="container">
        <div class="row">
            {{--  Update header part  --}}
            <div class="col-lg-12">
                <div class="v-pro-body">
                    <div class="row">

                        <div class="col-lg-4 col-sm-6 col-md-6">
                            <div class="pro-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6><strong>Name : </strong>{{ $user->name }}</h6>
                                        <h6><strong>Email : </strong>{{ $user->email }}</h6>
                                        <h6>
                                            <span><strong>Phone Number : </strong>{{ $user->phone }}</span>
                                        </h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 p-0 col-sm-6 col-md-6">
                            <div class="cmn-btn">
                                <a class="btn btn-primary" role="button" data-toggle="modal"
                                    data-target="#feedback">Feedback</a>
                                <a class="btn btn-primary mt-1" role="button" data-toggle="modal"
                                    data-target="#paymentAndStatus">Payment Status</a>
                                @if ($user->payment_exp < Carbon\Carbon::now()) <a type="button" class="btn btn-primary"
                                    role="button" data-toggle="modal" data-target="#contactUser">Pay Now</a>
                                    @endif
                                    <a class="btn btn-primary mt-1" href="{{ route('password.request') }}"
                                        role="button">Change Password</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- View Profile Part End -->
@endif



<!-- Modal for feedback -->
<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="feedLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedLabel">Write a feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('testimonial/'.$user->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Give a feedback</label>
                        <input type="text" class="form-control" name="testimonial" placeholder="Write a happy story">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for chekc payment status -->
<div class="modal fade" id="paymentAndStatus" tabindex="-1" role="dialog" aria-labelledby="paymentAndStatusLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentAndStatusLabel">Your payment status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>Payment Date</h1>
                <p><span class="font-weight-bold"></span> {{ $user->payment_date }}</p>
                <h1>Payment Eapired Date</h1>
                <p><span class="font-weight-bold"></span> {{ $user->payment_exp }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment select -->
<div class="modal fade" id="contactUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Method</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('payment.process') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <ul>
                            <li><input type="radio" name="payment" value="paypal"><img
                                    src="{{ asset('public/frontend/images/stripe.png') }}" style="width: 100px" alt="">
                            </li>
                            {{-- <li><input type="radio" name="payment" value="mastercard"><img
                                    src="{{ asset('public/frontend/images/mastercard.png') }}" style="width: 100px"
                                    alt=""></li>
                            <li><input type="radio" name="payment" value="visa"><img
                                    src="{{ asset('public/frontend/images/visa.png') }}" style="width: 100px" alt="">
                            </li> --}}
                        </ul>
                    </div>
                    <input type="submit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Head Information Modal Start -->
<div class="pro-edit-modal">
    <div class="modal fade" id="editHeadInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Basics & Lifestyle</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update_user_header/'.$user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $user->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                                <input type="hidden" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option>{{ $user->gender }}</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Age</label>
                                <select class="form-control @error('age') is-invalid @enderror" name="age">
                                    <option value="{{ $user->age }}">{{ $user->age }}</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                </select>
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Height</label>
                                <select class="form-control @error('height') is-invalid @enderror" name="height">
                                    <option value="{{ $user->height }}">{{ $user->height }}</option>
                                    <option value="4ft">4ft</option>
                                    <option value="4ft 1in">4ft 1in</option>
                                    <option value="4ft 2in">4ft 2in</option>
                                    <option value="4ft 3in">4ft 3in</option>
                                    <option value="4ft 4in">4ft 4in</option>
                                    <option value="4ft 5in">4ft 5in</option>
                                    <option value="4ft 6in">4ft 6in</option>
                                    <option value="4ft 7in">4ft 7in</option>
                                    <option value="4ft 8in">4ft 8in</option>
                                    <option value="4ft 9in">4ft 9in</option>
                                    <option value="4ft 10in">4ft 10in</option>
                                    <option value="4ft 11in">4ft 11in</option>
                                    <option value="5ft">5ft</option>
                                    <option value="5ft 1in">5ft 1in</option>
                                    <option value="5ft 2in">5ft 2in</option>
                                    <option value="5ft 3in">5ft 3in</option>
                                    <option value="5ft 4in">5ft 4in</option>
                                    <option value="5ft 5in">5ft 5in</option>
                                    <option value="5ft 6in">5ft 6in</option>
                                    <option value="5ft 7in">5ft 7in</option>
                                    <option value="5ft 8in">5ft 8in</option>
                                    <option value="5ft 9in">5ft 9in</option>
                                    <option value="5ft 10in">5ft 10in</option>
                                    <option value="5ft 11in">5ft 11in</option>
                                    <option value="6ft">6ft</option>
                                    <option value="6ft 1in">6ft 1in</option>
                                    <option value="6ft 2in">6ft 2in</option>
                                    <option value="6ft 3in">6ft 3in</option>
                                    <option value="6ft 4in">6ft 4in</option>
                                    <option value="6ft 5in">6ft 5in</option>
                                    <option value="6ft 6in">6ft 6in</option>
                                    <option value="6ft 7in">6ft 7in</option>
                                    <option value="6ft 8in">6ft 8in</option>
                                    <option value="6ft 9in">6ft 9in</option>
                                    <option value="6ft 10in">6ft 10in</option>
                                    <option value="6ft 11in">6ft 11in</option>
                                </select>
                                @error('height')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    name="location" value="{{ $user->location }}">
                                @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="religion">Religion</label>
                                <select class="form-control @error('religion') is-invalid @enderror" name="religion">
                                    <option value="{{ $user->religion }}">{{ $user->religion }}</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddish">Buddish</option>
                                    <option value="Christian">Christian</option>
                                </select>
                                @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Mother Tongue</label>
                                <input type="text" class="form-control @error('mothertongue') is-invalid @enderror"
                                    name="mothertongue" value="{{ $user->mothertongue }}">
                                @error('mothertongue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="occupation">occupation</label>
                                <select class="form-control @error('occupation') is-invalid @enderror"
                                    name="occupation">
                                    <option value="{{ $user->occupation }}">{{ $user->occupation }}</option>
                                    <optgroup label="Accounting, Banking &amp; Finance"></optgroup>
                                    <option value="Accounting Professional">Accounting Professional</option>
                                    <option value="Banking Professional">Banking Professional</option>
                                    <option value="Chartered Accountant">Chartered Accountant</option>
                                    <option value="Finance Professional">Finance Professional</option>
                                    <option value="Investment Professional">Investment Professional</option>
                                    <option value="Accounting &amp; Finance (Others)">Accounting &amp; Finance (Others)
                                    </option>

                                    <optgroup label="Administration &amp; HR"></optgroup>
                                    <option value="Admin Professional">Admin Professional</option>
                                    <option value="Human Resources Professional">Human Resources Professional</option>

                                    <optgroup label="Advertising, Media &amp; Entertainment"></optgroup>
                                    <option value="Actor">Actor</option>
                                    <option value="Advertising Professional">Advertising Professional</option>
                                    <option value="Entertainment Professional">Entertainment Professional</option>
                                    <option value="Event Manager">Event Manager</option>
                                    <option value="Journalist">Journalist</option>
                                    <option value="Media Professional">Media Professional</option>
                                    <option value="Public Relations Professional">Public Relations Professional</option>

                                    <optgroup label="Agriculture"></optgroup>
                                    <option value="4#Agricultural Professional">Agricultural Professional</option>

                                    <optgroup label="Airline &amp; Aviation"></optgroup>
                                    <option value="Air Hostess / Flight Attendant">Air Hostess / Flight Attendant
                                    </option>
                                    <option value="Pilot">Pilot</option>
                                    <option value="Airline Professional">Airline Professional</option>

                                    <optgroup label="Architecture &amp; Design"></optgroup>
                                    <option value="Architect">Architect</option>
                                    <option value="Interior Designer">Interior Designer</option>

                                    <optgroup label="Artists &amp; Animators"></optgroup>
                                    <option value="Animator">Animator</option>
                                    <option value="Artist">Artist</option>

                                    <optgroup label="Beauty &amp; Fashion"></optgroup>
                                    <option value="Beautician">Beautician</option>
                                    <option value="Fashion Designer">Fashion Designer</option>

                                    <optgroup label="Defense"></optgroup>
                                    <option value="Airforce">Airforce</option>
                                    <option value="Army">Army</option>
                                    <option value="Navy">Navy</option>
                                    <option value="Defense Services (Others)">Defense Services (Others)</option>

                                    <optgroup label="Education &amp; Training"></optgroup>
                                    <option value="Lecturer">Lecturer</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Teacher">Teacher</option>

                                    <optgroup label="Engineering"></optgroup>
                                    <option value="Civil Engineer">Civil Engineer</option>
                                    <option value="Electronics / Telecom Engineer">Electronics / Telecom Engineer
                                    </option>
                                    <option value="Mechanical / Production Engineer">Mechanical / Production Engineer
                                    </option>
                                    <option value="Engineer (Non IT)">Engineer (Non IT)</option>

                                    <optgroup label="IT &amp; Software Engineering"></optgroup>
                                    <option value="Software Engineer / Programmer">Software Engineer / Programmer
                                    </option>
                                    <option value="Software Consultant">Software Consultant</option>
                                    <option value="Hardware &amp; Networking professional">Hardware &amp; Networking
                                        professional</option>
                                    <option value="Database Administrator">Database Administrator</option>
                                    <option value="Web / UX Designers / Graphics Designers">Web / UX Designers /
                                        Graphics
                                        Designers</option>
                                    <option value="Computer Operator">Computer Operator</option>
                                    <option value="Computers / IT">Computers / IT</option>
                                    <option value="Software Professional (Others)">Software Professional (Others)
                                    </option>

                                    <optgroup label="Legal"></optgroup>
                                    <option value="Lawyer">Lawyer</option>
                                    <option value="Legal Assistant">Legal Assistant</option>
                                    <option value="Legal Professional (Others)">Legal Professional (Others)</option>

                                    <optgroup label="Medical &amp; Healthcare"></optgroup>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Dentist">Dentist</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                    <option value="Psychologist">Psychologist</option>
                                    <option value="Therapist">Therapist</option>
                                    <option value="Medical / Healthcare Professional">Medical / Healthcare Professional
                                    </option>

                                    <optgroup label="Sales &amp; Marketing"></optgroup>
                                    <option value="Marketing Professional">Marketing Professional</option>
                                    <option value="Sales Professional">Sales Professional</option>

                                    <optgroup label="Business &amp; Others"></optgroup>
                                    <option value="Business Owner / Entrepreneur">Business Owner / Entrepreneur</option>
                                    <option value="Consultant / Supervisor">Consultant / Supervisor</option>
                                    <option value="Politician">Politician</option>
                                    <option value="Sportsman">Sportsman</option>
                                    <option value="Travel &amp; Transport Professional">Travel &amp; Transport
                                        Professional
                                    </option>
                                    <option value="Writer">Writer</option>
                                    <option value="Not Defined">Not Defined</option>

                                    <optgroup label="Not Working"></optgroup>
                                    <option value="Student">Student</option>
                                    <option value="Not Working">Not Working</option>
                                </select>
                                @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Marital Status</label>
                                <input type="text" class="form-control @error('maritalstatus') is-invalid @enderror"
                                    name="maritalstatus" value="{{ $user->maritalstatus }}">
                                @error('maritalstatus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="avatar" class="col-md-4 col-form-label">Image</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                        value="{{ $user->avatar }}" name="avatar">
                                    <p>Present Photo</p>
                                    <img height="80px" width="80px" src="{{ $user->avatar }}" alt="">
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="pro-edit-modal-btn text-center w-100">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Head Information Modal End -->

<!-- Information Details Modal Start -->
<div class="pro-edit-modal">
    <div class="modal fade" id="editPersonality" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Personality</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update_user_delails/'.$user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <textarea type="text" class="form-control @error('details') is-invalid @enderror" rows="3"
                                name="details" placeholder="Write Here">{{ $user->details }}</textarea>
                            @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="pro-edit-modal-btn text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Information Details Modal End -->

<!-- Basic & Lifestyle Modal Start -->
<div class="pro-edit-modal">
    <div class="modal fade" id="basicLifeStyle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Basics & Lifestyle</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update_user_basics/'.$user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Date of Birth</label>
                                <input type="text" class="form-control @error('dob') is-invalid @enderror" name="dob"
                                    value="{{ $user->dob }}">
                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Grew Up In</label>
                                <input type="text" class="form-control @error('grewup') is-invalid @enderror"
                                    name="grewup" value="{{ $user->grewup }}">
                                @error('grewup')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Blood</label>
                                <input type="text" class="form-control @error('blood') is-invalid @enderror"
                                    name="blood" value="{{ $user->blood }}">
                                @error('blood')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Weight</label>
                                <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                    name="weight" value="{{ $user->weight }}">
                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Smoke</label>
                                <input type="text" class="form-control @error('smoke') is-invalid @enderror"
                                    name="smoke" value="{{ $user->smoke }}">
                                @error('smoke')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Body Type</label>
                                <select name="bodytype" class="form-control @error('bodytype') is-invalid @enderror">
                                    <option value="{{ $user->bodytype }}">{{ $user->bodytype }}</option>
                                    <option value="Average">Average</option>
                                    <option value="Slim">Slim</option>
                                    <option value="Athletic">Athletic</option>
                                    <option value="Heavy">Heavy</option>
                                </select>
                                @error('bodytype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Complexion</label>
                                <select name="complexion"
                                    class="form-control @error('complexion') is-invalid @enderror">
                                    <option value="{{ $user->complexion }}">{{ $user->complexion }}</option>
                                    <option value="Very Fair">Very Fair</option>
                                    <option value="Fair">Fair</option>
                                    <option value="Wheatish">Wheatish</option>
                                    <option value="Dark">Dark</option>
                                </select>
                                @error('complexion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="country">Country Now Live In</label>
                                <select class="form-control @error('country') is-invalid @enderror" name="country">
                                    <option value="{{ $user->country }}">{{ $user->country }}</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="USA">USA</option>
                                    <option value="Canada">Canada</option>
                                </select>
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pro-edit-modal-btn text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic & Lifestyle Modal End -->

<!-- Family Details Modal Start -->
<div class="pro-edit-modal">
    <div class="modal fade" id="familyDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Family Details</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update_user_family/'.$user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Father Status</label>
                                <select class="form-control @error('fatherstatus') is-invalid @enderror"
                                    name="fatherstatus" required="">
                                    <option value="{{ $user->fatherstatus }}">{{ $user->fatherstatus }}</option>
                                    <option value="Employed" label="Employed">Employed</option>
                                    <option value="Business" label="Business">Business</option>
                                    <option value="Retired" label="Retired">Retired</option>
                                    <option value="Not Employed" label="Not Employed">Not Employed</option>
                                    <option value="Passed Away" label="Passed Away">Passed Away</option>
                                    <option value="Professional" label="Professional">Professional</option>
                                </select>
                                @error('fatherstatus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>No. of Brothers</label>
                                <input type="text" class="form-control @error('brothers') is-invalid @enderror"
                                    name="brothers" value="{{ $user->brothers }}">
                                @error('brothers')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Mother Status</label>
                                <select class="form-control @error('motherstatus') is-invalid @enderror"
                                    name="motherstatus" required="">
                                    <option value="{{ $user->motherstatus }}">{{ $user->motherstatus }}</option>
                                    <option value="Employed" label="Employed">Employed</option>
                                    <option value="Business" label="Business">Business</option>
                                    <option value="Retired" label="Retired">Retired</option>
                                    <option value="Not Employed" label="Not Employed">Not Employed</option>
                                    <option value="Passed Away" label="Passed Away">Passed Away</option>
                                    <option value="Professional" label="Professional">Professional</option>
                                </select>
                                @error('motherstatus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>No. of Sisters</label>
                                <input type="text" class="form-control @error('sisters') is-invalid @enderror"
                                    name="sisters" value="{{ $user->sisters }}">
                                @error('sisters')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="pro-edit-modal-btn text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Family Details Modal End -->

<!-- Education & Career Modal Start -->
<div class="pro-edit-modal">
    <div class="modal fade" id="educationAnCareer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Education & Career</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update_user_education/'.$user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Education</label>
                                <input type="text" class="form-control @error('education') is-invalid @enderror"
                                    name="education" value="{{ $user->education }}">
                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>University</label>
                                <input type="text" class="form-control @error('university') is-invalid @enderror"
                                    name="university" value="{{ $user->university }}">
                                @error('university')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Annual Income</label>
                                <input type="text" class="form-control @error('income') is-invalid @enderror"
                                    name="income" value="{{ $user->income }}">
                                @error('income')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Working With</label>
                                <input type="text" class="form-control @error('workingwith') is-invalid @enderror"
                                    name="workingwith" value="{{ $user->workingwith }}">
                                @error('workingwith')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Profession</label>
                                <input type="text" class="form-control @error('profession') is-invalid @enderror"
                                    name="profession" value="{{ $user->profession }}">
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="pro-edit-modal-btn text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Education & Career Modal End -->

<!-- Contact Modal Start -->
<div class="pro-edit-modal">
    <div class="modal fade" id="contactForPaidUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Family Details</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update_user_contact/'.$user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Phone Number</label>
                                <input type="number" class="form-control @error('userphone') is-invalid @enderror"
                                    name="userphone" value="{{ $user->userphone }}">
                                @error('userphone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Facebook Link</label>
                                <input type="text" class="form-control @error('userfacebook') is-invalid @enderror"
                                    name="userfacebook" value="{{ $user->userfacebook }}">
                                @error('userfacebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pro-edit-modal-btn text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Details Modal End -->


<!-- Multi Image view -->
<!-- <div class="row border p-4 mt-2">
            <div class="col-lg-12">
                <h4>Details</h4>
                <p class="text-justify">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in
                    laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in
                    the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et
                    Malorum in a type specimen book.</p>
            </div>
        </div>

        <div class="gallery border p-4 mt-2">
            <h4>Gallery</h4>
            <div class="row">
                <div class="col-md-2 pt-2">
                    <div class="ih-item square colored effect6 from_top_and_bottom">
                        <a href="../images/team1.jpeg" data-lightbox="myGallery" data-title="">
                            <div class="img">
                                <img src="../images/team1.jpeg" height="50px" alt="img" class="img-fluid" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 pt-2">
                    <div class="ih-item square colored effect6 from_top_and_bottom">
                        <a href="../images/team2.jpeg" data-lightbox="myGallery" data-title="">
                            <div class="img">
                                <img src="../images/team2.jpeg" alt="img" class="img-fluid" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 pt-2">
                    <div class="ih-item square colored effect6 from_top_and_bottom">
                        <a href="../images/team3.jpeg" data-lightbox="myGallery" data-title="">
                            <div class="img">
                                <img src="../images/team3.jpeg" alt="img" class="img-fluid" />
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
