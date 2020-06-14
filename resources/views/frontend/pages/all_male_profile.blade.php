@extends('frontend.app')

@include('frontend.menu')
<!-- Featured Male Profile Part Start -->
<section id="view-all-male">
    <div class="container common-card-item">
        <div class="row">
            @foreach ($maleFeatured as $maleFeatured)
            @if ($maleFeatured->gender=="Male" && $maleFeatured->user_type=="0" && $maleFeatured->status=="1")
            <div class="col-lg-3 col-sm-6">
                <div class="card" style="margin-bottom: 30px;">
                    <img class="card-img-top" src="{{ $maleFeatured->avatar }}" alt="Card image cap"
                        style="height: 220px; border-radius: 8px;">
                    <div class="card-body text-center">
                        <span>Name: {{ $maleFeatured->name }}</span>
                        <span>Age: {{ $maleFeatured->age }}</span>
                        <span>Height: {{ $maleFeatured->height }}</span>
                        <span>Religion: {{ $maleFeatured->religion }}</span>
                        @if (Auth::check())
                        <a href="{{ url('detailsProfile/'.$maleFeatured->id) }}" class="btn btn-primary">View
                            Profile</a>
                        @else
                        <a data-toggle="modal" data-target="#login" class="btn btn-primary">View Profile</a>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Male Profile Part End -->
