@extends('backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <input type="hidden" value="{{ $service->id }}">
                <div class="form-group">
                  <label>Icon</label>
                  <input type="text" class="form-control" value="{{ $service->icon }}" name="icon" placeholder="Add icon" readonly>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" value="{{ $service->title }}" name="title" placeholder="Add Title" readonly>
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" value="{{ $service->description }}" name="description" placeholder="Add description" readonly>
                  </div>
              </form>
        </div>
    </div>
</div>
@endsection

