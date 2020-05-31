
@extends('frontend.app')
<link rel="stylesheet" href="{{ asset('public/frontend/css/userProfile.css') }}" />
@include('frontend.menu')
<div class="container">
    @if (session()->has('success'))
    <div class="row">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="border ml-5 bg-success p-2">&times;</span></button>{{ session()->get('success') }}
        </div>
    </div>
    @elseif (session()->has('danger'))
    <div class="row">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="border ml-5 bg-danger p-2">&times;</span></button>{{ session()->get('danger') }}
        </div>
    </div>
    @endif
</div>
<!-- View Profile Part Start -->
<section id="v-profile">
  <div class="container">
    <div class="row">
        {{--  Update header part  --}}
      <div class="col-lg-12">
        <div class="v-pro-body">
          <div class="row">
            <div class="col-lg-2">
              <div class="pro-img">
                <img src="{{ asset($user->avatar) }}" alt="img" style="height: 120px;" class="w-100">
                <div class="overlay">
                  <h5><a href="#">Edit</a></h5>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
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
            <div class="col-lg-2 p-0">
              <div class="cmn-btn">
                <a class="btn btn-primary" href="{{ url('editHeader') }}" role="button">Edit</a>
                <a class="btn btn-primary" role="button"  data-toggle="modal" data-target="#feedback">Feedback</a>
                <a class="btn btn-primary mt-1" role="button" data-toggle="modal" data-target="#paymentAndStatus">Payment Status</a>
                <a class="btn btn-primary mt-1" href="{{ route('password.request') }}" role="button">Change Password</a>
              </div>
            </div>




            <div class="col-lg-12">
                {{--  Edit details  --}}
              <div class="v-pro-cmn">
                <div class="row">
                  <div class="col-lg-10">
                    <h6>Personality, Family Details, Career, Partner Expectations etc.</h6>
                  </div>
                  <div class="col-lg-2">
                    <div class="edit-btn text-right">
                      <a href="{{ url('editDetails') }}" role="button">Edit</a>
                    </div>
                  </div>
                </div>
                <p class="border-btm">{{ $user->details }}</p>
              </div>

              {{--  Edit Basics & Lifestyle  --}}
              <div class="v-pro-cmn">
                <div class="row">
                  <div class="col-lg-10">
                    <h6>Basics & Lifestyle</h6>
                  </div>
                  <div class="col-lg-2">
                    <div class="edit-btn text-right">
                      <a href="{{ url('editBasics') }}">Edit</a>
                    </div>
                  </div>
                </div>
                <div class="border-btm"></div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="basics">
                      <h5><strong>Date of Birth : </strong>{{ $user->dob }}</h5>
                      <h5><strong>Body Weight : </strong>{{ $user->weight }}</h5>
                      <h5><strong>Blood : </strong>{{ $user->blood }}</h5>
                      <h5><strong>Grew up in : </strong>{{ $user->grewup }}</h5>
                    </div>
                  </div>
                  <div class="col-lg-6">
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
                  <div class="col-lg-10">
                    <h6>Family Details</h6>
                  </div>
                  <div class="col-lg-2">
                    <div class="edit-btn text-right">
                      <a href="{{ url('editFamily') }}" role="button">Edit</a>
                    </div>
                  </div>
                </div>
                <div class="border-btm"></div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="basics">
                      <h5><strong>Father's Status : </strong>{{ $user->fatherstatus }}</h5>
                      <h5><strong>Mother's Status : </strong>{{ $user->motherstatus }}</h5>
                    </div>
                  </div>
                  <div class="col-lg-6">
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
                  <div class="col-lg-10">
                    <h6>Education & Career</h6>
                  </div>
                  <div class="col-lg-2">
                    <div class="edit-btn text-right">
                      <a href="{{ url('editEducation') }}" role="button" >Edit</a>
                    </div>
                  </div>
                </div>
                <div class="border-btm"></div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="basics">
                      <h5><strong>Education : </strong>{{ $user->education }}</h5>
                      <h5><strong>University : </strong>{{ $user->university }}</h5>
                      <h5><strong>Annual Income : </strong>{{ $user->income }}</h5>
                    </div>
                  </div>
                  <div class="col-lg-6">
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
                  <div class="col-lg-10">
                    <h6>Only Paid Member Will Be Able To See This</h6>
                  </div>
                  <div class="col-lg-2">
                    <div class="edit-btn text-right">
                      <a href="{{ url('editUserContact') }}" role="button">Edit</a>
                    </div>
                  </div>
                </div>
                <div class="border-btm"></div>
                <div class="row">
                  <div class="col-lg-6">
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

<!-- Modal for payment -->
<div class="modal fade" id="paymentAndStatus" tabindex="-1" role="dialog" aria-labelledby="paymentAndStatusLabel" aria-hidden="true">
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

            @if ($user->payment_exp < Carbon\Carbon::now())
            <div class="col-md-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactUser">
                Pay Now
                </button>

                <!-- Modal -->
                <div class="modal fade" id="contactUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <li><input type="radio" name="payment" value="paypal"><img src="{{ asset('public/frontend/images/PayPal.png') }}" style="width: 100px" alt=""></li>
                                            <li><input type="radio" name="payment" value="mastercard"><img src="{{ asset('public/frontend/images/mastercard.png') }}" style="width: 100px" alt=""></li>
                                            <li><input type="radio" name="payment" value="visa"><img src="{{ asset('public/frontend/images/visa.png') }}" style="width: 100px" alt=""></li>
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
            </div>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>



























        {{--  <div class="row border p-4 mt-2">
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
        </div>  --}}
