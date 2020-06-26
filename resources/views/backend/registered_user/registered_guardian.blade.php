@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Visitors Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($registeredGardian as $registeredGardian)
                      @if($registeredGardian->user_type=="5" && $registeredGardian->pending=="1")
                    <tr>
                      <td>{{$registeredGardian->id}}</td>
                      <td>{{$registeredGardian->name}}</td>
                      <td>{{$registeredGardian->email}}</td>
                      <td>{{$registeredGardian->userphone}}</td>
                      <td><a href="{{ url('registeredGardianDelete/'.$registeredGardian->id) }}" id="delete" class="btn btn-danger">Delete</a></td>
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
