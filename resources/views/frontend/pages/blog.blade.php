@extends('frontend.app')

@include('frontend.menu')
<!-- Featured Profile Part Start -->
<section id="featured">
  <div class="container">
    <div class="row">

      @foreach ($blog as $blog)
      @if ($blog->status=="1")
      <div class="col-lg-4">
        <div class="card">
          <img class="card-img-top" src="{{ $blog->image }}" alt="Card image cap" style="height: 200px; border-radius: 8px;">
          <div class="card-body text-center">
            <span class="font-weight-bold">Name: {{ $blog->title }}</span>
            <span>Age: {{ $blog->description }}</span>
            @if(Auth::user())
                <a href="#" class="btn btn-primary">Read More</a>
            @else
            <!-- Button trigger modal -->
            <a class="btn btn-primary" data-toggle="modal" data-target="#viewProfile">Read More</a>
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
        <h5 class="modal-title" id="viewProfileLabel"><img src="{{ asset('public/frontend/images/zibonshathi.png') }}" alt="logo" style="width: 130px; height: 65px;"></h5>

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





