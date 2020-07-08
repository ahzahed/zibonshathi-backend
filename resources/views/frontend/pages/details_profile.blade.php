@extends('frontend.app')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    .gallery .row>.column {
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
<!-- View Profile Part Start -->
<section id="v-profile">
    <div class="container">
        <div class="row">
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

                            {{--  Gallery  --}}
                            <div class="v-pro-cmn">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6>Gallery</h6>
                                    </div>
                                </div>
                                <div class="border-btm"></div>
                                <div class="row">
                                    @if (Auth::user()->payment_exp < Carbon\Carbon::now()) <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#contactUser">Pay First</button>
                                        @else
                                        <div class="gallery border p-4 mt-2">
                                            {{-- <div class="row"> --}}
                                            <div class="column col-md-2">
                                                @if ($user->avatar == NULL)
                                                    <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                                @else
                                                <img src="{{ asset($user->avatar) }}" style="height: 150px; width: 100%"
                                                    onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                                                    @endif
                                            </div>
                                            <div class="column col-md-2">
                                                @if ($user->gimage1 == NULL)
                                                    <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                                @else
                                                <img src="{{ asset($user->gimage1) }}"
                                                    style="height: 150px; width: 100%"
                                                    onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
                                                    @endif
                                            </div>
                                            <div class="column col-md-2">
                                                @if ($user->gimage2 == NULL)
                                                    <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                                @else
                                                <img src="{{ asset($user->gimage2) }}"
                                                    style="height: 150px; width: 100%"
                                                    onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
                                                    @endif
                                            </div>
                                            <div class="column col-md-2">
                                                @if ($user->gimage3 == NULL)
                                                    <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                                @else
                                                <img src="{{ asset($user->gimage3) }}"
                                                    style="height: 150px; width: 100%"
                                                    onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
                                                    @endif
                                            </div>
                                            <div class="column col-md-2">
                                                @if ($user->gimage4 == NULL)
                                                    <img src="{{ asset('public/frontend/images/avatar-default.png') }}" alt="img" style="height: 120px;" class="w-100">
                                                @else
                                                <img src="{{ asset($user->gimage4) }}"
                                                    style="height: 150px; width: 100%"
                                                    onclick="openModal();currentSlide(5)" class="hover-shadow cursor">
                                                    @endif
                                            </div>
                                            {{-- </div> --}}

                                            <div id="myModal" class="modal" style="z-index: 999999">
                                                <span class="close cursor" onclick="closeModal()">&times;</span>
                                                <div class="modal-content">
                                                    <div class="mySlides">
                                                        <div class="numbertext">1 / 4</div>
                                                        <img src="{{ asset($user->avatar) }}" style="width:100%">
                                                    </div>
                                                    <div class="mySlides">
                                                        <div class="numbertext">2 / 4</div>
                                                        <img src="{{ asset($user->gimage1) }}" style="width:100%">
                                                    </div>

                                                    <div class="mySlides">
                                                        <div class="numbertext">3 / 4</div>
                                                        <img src="{{ asset($user->gimage2) }}" style="width:100%">
                                                    </div>

                                                    <div class="mySlides">
                                                        <div class="numbertext">4 / 4</div>
                                                        <img src="{{ asset($user->gimage3) }}" style="width:100%">
                                                    </div>

                                                    <div class="mySlides">
                                                        <div class="numbertext">5 / 4</div>
                                                        <img src="{{ asset($user->gimage4) }}" style="width:100%">
                                                    </div>

                                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                                    <div class="caption-container">
                                                        <p id="caption"></p>
                                                    </div>


                                                    <div class="column">
                                                        <img class="demo cursor" src="{{ asset($user->avatar) }}"
                                                            style="width:100%" onclick="currentSlide(1)" alt="">
                                                    </div>
                                                    <div class="column">
                                                        <img class="demo cursor" src="{{ asset($user->gimage1) }}"
                                                            style="width:100%" onclick="currentSlide(2)" alt="">
                                                    </div>
                                                    <div class="column">
                                                        <img class="demo cursor" src="{{ asset($user->gimage2) }}"
                                                            style="width:100%" onclick="currentSlide(3)" alt="">
                                                    </div>
                                                    <div class="column">
                                                        <img class="demo cursor" src="{{ asset($user->gimage3) }}"
                                                            style="width:100%" onclick="currentSlide(4)" alt="">
                                                    </div>
                                                    <div class="column">
                                                        <img class="demo cursor" src="{{ asset($user->gimage4) }}"
                                                            style="width:100%" onclick="currentSlide(5)" alt="">
                                                    </div>
                                                </div>
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
                                    src="{{ asset('public/frontend/images/stripe.png') }}" style="width: 100px" alt="">
                            </li>
                            {{--  <li><input type="radio" name="payment" value="mastercard"><img
                                    src="{{ asset('public/frontend/images/mastercard.png') }}" style="width: 100px"
                                    alt=""></li>
                            <li><input type="radio" name="payment" value="visa"><img
                                    src="{{ asset('public/frontend/images/visa.png') }}" style="width: 100px" alt="">
                            </li>  --}}
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
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
