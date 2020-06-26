@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Message Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total Message
                @forelse($contact as $contacts)
                <span class="badge badge-secondary">
                {{ $loop->count }}
                @break
            </span>
            @empty
            <span class="badge badge-danger">
                No Message Today
            </span>
                 @endforelse
            </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Action</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($contact as $contact)
                    <tr>
                      <td>{{$contact->id}}</td>
                      <td>{{$contact->fname}} {{$contact->lname}}</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->message}}</td>
                      <td><a href="{{ URL::to('contact/'.$contact->id) }}" class="btn btn-primary">View</a></td>
                      <td><form action="{{ URL::to('contact/'.$contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" id="delete" type="submit">Delete</button>
                      </form></td>
                      <td><a type="button" class="btn btn-info" data-toggle="modal" data-target="#replypeople">Reply</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->



        <!-- Reply User -->
<div class="modal fade" id="replypeople" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Write a reply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('replypeople/'.$contact->id) }}" method="POST">
        @csrf
      <div class="modal-body">
            <input type="hidden" value="{{ $contact->id }}">
            <textarea class="form-control" name="replypeople" id="" cols="30" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
