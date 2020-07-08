@extends('frontend.app')
@section('content')
@include('frontend.menu')


<div class="container text-center pt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1>Not found!</h1>
            <a href="{{ url('/') }}" class="btn btn-warning">Back</a>
        </div>
    </div>
</div>
@endsection
