@extends('backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <input type="hidden" value="{{ $contact->id }}">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" value="{{ $contact->fname }} {{ $contact->lname }}" readonly>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ $contact->email }}" readonly>
                  </div>

                  <div class="form-group">
                    <label>Message</label>
                    <textarea type="text" class="form-control" readonly>{{ $contact->message }}</textarea>
                  </div>
              </form>
        </div>
    </div>
</div>
@endsection

