@extends('backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('service.add') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Icon</label>
                  <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="Add icon">
                  @error('icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" placeholder="Add Title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror"  name="description" placeholder="Add description">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection

