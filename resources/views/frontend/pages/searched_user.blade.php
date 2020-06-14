@extends('frontend.app')

@include('frontend.menu')

<!-- Search Part Start -->
<section id="search-page">
    <div class="container common-card-item">
        <div class="row search-content">
            @foreach ($users as $users)
            @if ($users->user_type=="0" && $users->status=="1")
            <div class="col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="{{ $users->avatar }}" alt="Card image cap"
                        style="height: 200px; border-radius: 8px;">
                    <div class="card-body text-center">
                        <span>Name: {{ $users->name }}</span>
                        <span>Age: {{ $users->age }}</span>
                        <span>Height: {{ $users->height }}</span>
                        <span>Occupation: {{ $users->occupation }}</span>
                        @if(Auth::check())
                        <a href="{{ url('detailsProfile/'.$users->id) }}" class="btn btn-primary">View Profile</a>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- Search Part End -->
