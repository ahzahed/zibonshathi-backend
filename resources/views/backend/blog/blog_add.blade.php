@extends('backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('/blog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image" placeholder="Add Image">
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Add Title">
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Add description">
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection

