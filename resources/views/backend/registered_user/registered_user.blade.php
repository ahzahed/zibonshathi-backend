@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Visitors Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total Registered User
                @forelse($registeredUser as $registeredUsers)
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
                      @foreach($registeredUser as $registeredUser)
                      @if($registeredUser->user_type=="0" && $registeredUser->pending=="1")
                    <tr>
                      <td>{{$registeredUser->id}}</td>
                      <td>{{$registeredUser->name}}</td>
                      <td>{{$registeredUser->email}}</td>
                        <td><a href="{{ url('registeredUserView/'.$registeredUser->id) }}" class="btn btn-primary">Details</a></td>
                        <td><a href="{{ url('registeredUserDelete/'.$registeredUser->id) }}" class="btn btn-danger">Delete</a></td>
                        <td>@if($registeredUser->status==0)
                            <a href="{{ url('registeredUserActive/'.$registeredUser->id) }}" class="btn btn-info">Active</a>
                          @else <a href="{{ url('registeredUserDeactive/'.$registeredUser->id) }}" class="btn btn-danger">Deactive</a> @endif
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
