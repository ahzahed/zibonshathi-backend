@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Visitors Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Todays Visitor
                @forelse($pendingUser as $pendingUsers)
                <span class="badge badge-secondary">
                {{ $loop->count }}
                @break
            </span>
            @empty
            <span class="badge badge-danger">
                No user today
            </span>
                 @endforelse
            </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th colspan="2">Action</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($pendingUser as $pendingUser)
                      @if($pendingUser->user_type=="0" && $pendingUser->pending=="0")
                    <tr>
                      <td>{{$pendingUser->id}}</td>
                      <td>{{$pendingUser->name}}</td>
                      <td>{{$pendingUser->email}}</td>
                      <td><a href="{{ url('pendingUserDelete/'.$pendingUser->id) }}" class="btn btn-danger">Delete</a></td>
                      <td><a href="{{ url('pendingUserView/'.$pendingUser->id) }}" class="btn btn-primary">Details</a></td>
                      <td>@if($pendingUser->status==0)
                          <a href="{{ url('approveUser/'.$pendingUser->id) }}" class="btn btn-info">Approve</a>
                        @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection
