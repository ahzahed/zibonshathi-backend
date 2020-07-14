@extends('frontend.app')
@section('content')

@include('frontend.menu')
<!-- Featured Male Profile Part Start -->
<section id="view-all-male">
    <div class="container common-card-item">
        <div class="row">
            @foreach ($blog as $blog)
            @if ($blog->status=="1")
            <div class="col-lg-4 col-sm-6">
                <div class="card" style="margin-bottom: 30px;">
                    <img class="card-img-top" src="{{ $blog->image }}" alt="Card image cap"
                        style="height: 220px; border-radius: 8px;">
                    <div class="card-body text-center">
                        <span class="font-weight-bold">{{ $blog->title }}</span>
                        <span>{{ $blog->description }}</span>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Male Profile Part End -->
@include('frontend.copyright')
@endsection
