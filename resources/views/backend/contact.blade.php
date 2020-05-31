@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Message Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Todays Message
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
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($contact as $contact)
                    <tr>
                      <td>{{$contact->id}}</td>
                      <td>{{$contact->fname}} {{$contact->lname}}</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->message}}</td>
                      <td><a href="">View</a></td>
                      <td><form action="{{ URL::to('contact/'.$contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection
