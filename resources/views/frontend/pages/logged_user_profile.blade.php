@extends('frontend.app')
@section('content')
<style>
    * {
      box-sizing: border-box;
    }

    .gallery .row > .column {
      padding: 0 8px;
    }

    .gallery .row:after {
      content: "";
      display: table;
      clear: both;
    }

    .gallery .column {
      float: left;
      width: 25%;
    }

    /* The Modal (background) */
    .gallery .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: black;
    }

    /* Modal Content */
    .gallery .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      width: 90%;
      max-width: 1200px;
    }

    /* The Close Button */
    .gallery .close {
      color: white;
      position: absolute;
      top: 10px;
      right: 25px;
      font-size: 35px;
      font-weight: bold;
    }

    .gallery .close:hover,
    .gallery .close:focus {
      color: #999;
      text-decoration: none;
      cursor: pointer;
    }

    .gallery .mySlides {
      display: none;
    }

    .gallery .cursor {
      cursor: pointer;
    }

    /* Next & previous buttons */
    .gallery .prev,
    .gallery .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -50px;
      color: white;
      font-weight: bold;
      font-size: 20px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
      -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .gallery .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .gallery .prev:hover,
    .gallery .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .gallery .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    .gallery img {
      margin-bottom: -4px;
    }

    .gallery .caption-container {
      text-align: center;
      background-color: black;
      padding: 2px 16px;
      color: white;
    }

    .gallery .demo {
      opacity: 0.6;
    }

    .gallery .active,
    .demo:hover {
      opacity: 1;
    }

    .gallery img.hover-shadow {
      transition: 0.3s;
    }

    .gallery .hover-shadow:hover {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    </style>
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
                                @if ($user->avatar == NULL)
                                <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 150px;" class="w-100">
                                @else
                                <img src="{{ asset($user->avatar) }}" alt="img" style="height: 150px;" class="w-100">
                                @endif
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

                            {{--  Gallery Upload  --}}
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Gallery Section</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">
                                            <a href="#" role="button" data-toggle="modal" data-target="#galleryimage">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-btm"></div>
                                <div class="gallery border p-4 mt-2">
                                    <div class="row">
                                        <div class="column">
                                            @if ($user->gimage1 == NULL)
                                        <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 150px;" class="w-100">
                                    @else
                                            <img src="{{ asset($user->gimage1) }}" style="width:100%; height:150px" onclick="openModal();currentSlide(1)"
                                                class="hover-shadow cursor">
                                                @endif
                                        </div>
                                        <div class="column">
                                            @if ($user->gimage1 == NULL)
                                        <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 150px;" class="w-100">
                                    @else
                                            <img src="{{ asset($user->gimage2) }}" style="width:100%; height:150px" onclick="openModal();currentSlide(2)"
                                                class="hover-shadow cursor">
                                                @endif
                                        </div>
                                        <div class="column">
                                            @if ($user->gimage1 == NULL)
                                        <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 150px;" class="w-100">
                                    @else
                                            <img src="{{ asset($user->gimage3) }}" style="width:100%; height:150px" onclick="openModal();currentSlide(3)"
                                                class="hover-shadow cursor">
                                                @endif
                                        </div>
                                        <div class="column">
                                            @if ($user->gimage1 == NULL)
                                        <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 150px;" class="w-100">
                                    @else
                                            <img src="{{ asset($user->gimage4) }}" style="width:100%; height:150px" onclick="openModal();currentSlide(4)"
                                                class="hover-shadow cursor">
                                                @endif
                                        </div>
                                    </div>

                                    <div id="myModal" class="modal" style="z-index: 999999">
                                        <span class="close cursor" onclick="closeModal()">&times;</span>
                                        <div class="modal-content">

                                            <div class="mySlides">
                                                <div class="numbertext">1 / 4</div>
                                                <img src="{{ asset($user->gimage1) }}" style="width:100%">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">2 / 4</div>
                                                <img src="{{ asset($user->gimage2) }}" style="width:100%">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">3 / 4</div>
                                                <img src="{{ asset($user->gimage3) }}" style="width:100%">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">4 / 4</div>
                                                <img src="{{ asset($user->gimage4) }}" style="width:100%">
                                            </div>

                                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                            <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                            <div class="caption-container">
                                                <p id="caption"></p>
                                            </div>


                                            <div class="column">
                                                <img class="demo cursor" src="{{ asset($user->gimage1) }}" style="width:100%" onclick="currentSlide(1)"
                                                    alt="Nature and sunrise">
                                            </div>
                                            <div class="column">
                                                <img class="demo cursor" src="{{ asset($user->gimage2) }}" style="width:100%" onclick="currentSlide(2)"
                                                    alt="Snow">
                                            </div>
                                            <div class="column">
                                                <img class="demo cursor" src="{{ asset($user->gimage3) }}" style="width:100%" onclick="currentSlide(3)"
                                                    alt="Mountains and fjords">
                                            </div>
                                            <div class="column">
                                                <img class="demo cursor" src="{{ asset($user->gimage4) }}" style="width:100%" onclick="currentSlide(4)"
                                                    alt="Northern Lights">
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
                                            <span><strong>Phone Number : </strong>{{ $user->userphone }}</span>
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
                <h1>Payment Expired Date</h1>
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
                                <label>Name <span style="color: red">*</span></label>
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
                                    name="email" value="{{ $user->email }}" readonly>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender">Gender <span style="color: red">*</span></label>
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
                                <label>Age <span style="color: red">*</span></label>
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
                                <label>Height <span style="color: red">*</span></label>
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
                                <label>Location <span style="color: red">*</span></label>
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
                                <label for="religion">Religion <span style="color: red">*</span></label>
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
                                <label>Mother Tongue <span style="color: red">*</span></label>
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
                                <label for="occupation">occupation <span style="color: red">*</span></label>
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
                                <label>Marital Status <span style="color: red">*</span></label>
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
                                <label for="avatar" class="col-md-4 col-form-label">Image <span style="color: red">*</span></label>
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
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo (DRC)">Congo (DRC)</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote d'Ivoire">Cote d Ivoire</option>
                                    <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji Islands">Fiji Islands</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong SAR">Hong Kong SAR</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea">Korea</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao SAR">Macao SAR</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="North Korea">North Korea</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn Islands">Pitcairn Islands</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="USA">USA</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Yugoslavia">Yugoslavia</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
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

<!-- Gallery Modal Start -->
<div class="pro-edit-modal">
    <div class="modal fade" id="galleryimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="POST" action="{{ url('update_gimage1/'.$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="file-field">
                            <div class="row">
                                <div class=" col-md-8 mb-4">
                                    <img id="original" src="" class=" z-depth-1-half avatar-pic" alt="">
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="btn btn-mdb-color btn-rounded float-left">
                                            <input type="file" name="gimage1" id="gimage1" required=""> <br>
                                            <button type="submit"
                                                class="btn btn-secondary d-flex justify-content-center mt-3">submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-4 mb-4">
                                    @if ($user->gimage1 == NULL)
                                        <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                    @else
                                    <img id="thumbImg" src="{{ asset($user->gimage1) }}" width="150px" class=" z-depth-1-half thumb-pic" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ url('update_gimage2/'.$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="file-field">
                            <div class="row">
                                <div class=" col-md-8 mb-4">
                                    <img id="original" src="" class=" z-depth-1-half avatar-pic" alt="">
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="btn btn-mdb-color btn-rounded float-left">
                                            <input type="file" name="gimage2" id="gimage2" required=""> <br>
                                            <button type="submit"
                                                class="btn btn-secondary d-flex justify-content-center mt-3">submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-4 mb-4">
                                    @if ($user->gimage1 == NULL)
                                        <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                    @else
                                    <img id="thumbImg" src="{{ asset($user->gimage2) }}" width="150px" class=" z-depth-1-half thumb-pic" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ url('update_gimage3/'.$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="file-field">
                            <div class="row">
                                <div class=" col-md-8 mb-4">
                                    <img id="original" src="" class=" z-depth-1-half avatar-pic" alt="">
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="btn btn-mdb-color btn-rounded float-left">
                                            <input type="file" name="gimage3" id="gimage3" required=""> <br>
                                            <button type="submit"
                                                class="btn btn-secondary d-flex justify-content-center mt-3">submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-4 mb-4">
                                    @if ($user->gimage1 == NULL)
                                        <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                    @else
                                    <img id="thumbImg" src="{{ asset($user->gimage3) }}" width="150px" class=" z-depth-1-half thumb-pic" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ url('update_gimage4/'.$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="file-field">
                            <div class="row">
                                <div class=" col-md-8 mb-4">
                                    <img id="original" src="{{ url('update_gimage4/'.$user->id) }}" class=" z-depth-1-half avatar-pic" alt="">
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="btn btn-mdb-color btn-rounded float-left">
                                            <input type="file" name="gimage4" id="gimage4" required=""> <br>
                                            <button type="submit"
                                                class="btn btn-secondary d-flex justify-content-center mt-3">submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-4 mb-4">
                                    @if ($user->gimage1 == NULL)
                                        <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                    @else
                                    <img id="thumbImg" src="{{ asset($user->gimage4) }}" width="150px" class=" z-depth-1-half thumb-pic" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!--  Gallery Modal End -->
@endsection

<script>
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>









