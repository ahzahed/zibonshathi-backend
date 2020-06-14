@extends('frontend.app')

@include('frontend.menu')
<!-- View Profile Part Start -->
<section id="v-profile">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="v-pro-body">
                    <div class="row">
                        <div class="col-lg-2 col-8 mx-auto col-sm-4 col-md-3">
                            <div class="pro-img">
                                <img src="{{ asset($user->avatar) }}" alt="img" style="height: 120px;" class="w-100">
                                <div class="overlay">
                                    <h5><a href="#">Edit</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-8 col-md-7">
                            <div class="pro-content">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6><strong>Name : </strong>{{ $user->name }}</h6>
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

                        </div>

                        <div class="col-lg-12">
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Personality, Family Details, Career, Partner Expectations etc.</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">

                                        </div>
                                    </div>
                                </div>
                                <p class="border-btm">{{ $user->details }}</p>
                            </div>
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Basics & Lifestyle</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">

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

                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Family Details</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">

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
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-10 col-10">
                                        <h6>Education & Career</h6>
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <div class="edit-btn text-right">

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

                            {{--  Contact  --}}
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6>Contact</h6>
                                    </div>
                                </div>
                                <div class="border-btm"></div>
                                <div class="row">
                                    @if (Auth::user()->payment_exp < Carbon\Carbon::now()) <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#contactUser">Pay First</button>
                                        @else
                                        <div class="col-lg-6">
                                            <div class="basics">
                                                <h6><strong>Phone Number : </strong>{{ $user->userphone }}</h6>
                                                <h6><strong>Facebook Link : </strong>{{ $user->userfacebook }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="basics ml-btm">
                                                <h6><strong>Email : </strong>{{ $user->email }}</h6>
                                            </div>
                                        </div>
                                        @endif
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

<!-- Modal -->
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
                                    src="{{ asset('public/frontend/images/PayPal.png') }}" style="width: 100px" alt="">
                            </li>
                            <li><input type="radio" name="payment" value="mastercard"><img
                                    src="{{ asset('public/frontend/images/mastercard.png') }}" style="width: 100px"
                                    alt=""></li>
                            <li><input type="radio" name="payment" value="visa"><img
                                    src="{{ asset('public/frontend/images/visa.png') }}" style="width: 100px" alt="">
                            </li>
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
