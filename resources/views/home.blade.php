@extends('frontend.app')

@section('content')
@include('frontend.menu')
@include('frontend.banner')
@include('frontend.howItWorks')
@include('frontend.services')

@include('frontend.maleFeatured')
@include('frontend.femaleFeatured')
@include('frontend.testimonial')
@include('frontend.footer')
@include('frontend.copyright')

{{--  @include('Frontend.Counter')

@include('Frontend.Blogs')
@include('Frontend.Video')  --}}


@endsection


