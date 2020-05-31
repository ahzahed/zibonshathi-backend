@extends('backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <input type="hidden" value="{{ $blog->id }}">
                <div class="form-group">
                  <label>Image</label>
                    <img src="{{ $blog->image }}" alt="">
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" value="{{ $blog->title }}" name="title" placeholder="Add Title" readonly>
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" value="{{ $blog->description }}" name="description" placeholder="Add description" readonly>
                  </div>
              </form>
        </div>
    </div>
</div>
@endsection

