@extends('frontend.app')
@section('content')
@include('frontend.menu')


<div class="container text-center pt-5">
    <div class="row">
        <div class="col-lg-12">
            <h2>Your <span class="danger">"{{ $update->email }}"</span> has already taken.</h2>
            @if ($update->provider != NULL)
            <h3>You registered with "{{ $update->provider }}". Try again with "{{ $update->provider }}" or Log In/Register manually.</h3>
            @else
            <h3>You are not registered with "Gmail/Facebook". Try again with "{{ $update->provider }}" or Log In/Register manually.</h3>
            @endif
            <a href="{{ url('/') }}" class="btn btn-warning">Back</a>
        </div>
    </div>
</div>
@endsection
