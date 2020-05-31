@extends('frontend.app')

@include('frontend.menu')
<!-- Featured Profile Part Start -->
<section id="featured">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title text-center">
          <h2>Searched Resutl</h2>
        </div>
      </div>
      @foreach ($users as $users)
      @if ($users->user_type=="0" && $users->status=="1")
      <div class="col-lg-3">
        <div class="card">
          <img class="card-img-top" src="{{ $users->avatar }}" alt="Card image cap" style="height: 200px; border-radius: 8px;">
          <div class="card-body text-center">
            <span>Name: {{ $users->name }}</span>
            <span>Age: {{ $users->age }}</span>
            <span>Height: {{ $users->height }}</span>
            <span>Occupation: {{ $users->occupation }}</span>
            @if(Auth::user() && $users->alldocument == '1')
                <a href="{{ url('detailsProfile/'.$users->id) }}" class="btn btn-primary">View Profile</a>
            @else
            <!-- Button trigger modal -->
            <a class="btn btn-primary" data-toggle="modal" data-target="#viewProfile">View Profile</a>
            @endif
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</section>

<!--View Profile Modal -->
<div class="login-modal">
<div class="modal fade" id="viewProfile" tabindex="-1" role="dialog" aria-labelledby="viewProfileLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="viewProfileLabel"><img src="{{ asset('public/Frontend/images/zibonshathi.png') }}" alt="logo" style="width: 130px; height: 65px;"></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            First Log in/Register <span class="text-danger">Or</span> Complete your profile
        </div>
    </div>
    </div>
</div>
</div>
<!-- Featured Profile Part End -->





