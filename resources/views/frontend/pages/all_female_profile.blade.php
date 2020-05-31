@extends('frontend.app')

@include('frontend.menu')
<!-- Featured Male Profile Part Start -->
<section id="featured">
  <div class="container common-card-item">
    <div class="row">
      <div class="col-lg-12">
        <div class="title text-center">
          <h2>All Female Profiles Featured</h2>
          <p>All Profiles Are Real and Verified, Feel Free to Contact Them</p>
        </div>
      </div>
      @foreach ($maleFeatured as $maleFeatured)
      @if ($maleFeatured->gender=="Female" && $maleFeatured->user_type=="0" && $maleFeatured->status=="1")
      <div class="col-lg-3">
        <div class="card">
          <img class="card-img-top" src="{{ $maleFeatured->avatar }}" alt="Card image cap" style="height: 200px; border-radius: 8px;">
          <div class="card-body text-center">
            <span>Name: {{ $maleFeatured->name }}</span>
            <span>Age: {{ $maleFeatured->age }}</span>
            <span>Height: {{ $maleFeatured->height }}</span>
            <span>Religion: {{ $maleFeatured->religion }}</span>
            @if (Auth::check())
                <a href="{{ url('detailsProfile/'.$maleFeatured->id) }}" class="btn btn-primary">View Profile</a>
            @else
                <a  data-toggle="modal" data-target="#login" class="btn btn-primary">View Profile</a>
            @endif
          </div>
        </div>
      </div>
      @endif
      @endforeach

    </div>
  </div>
</section>
<!-- Featured Profile Part End -->











