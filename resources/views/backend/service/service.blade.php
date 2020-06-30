@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Service Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total Service
                @forelse($service as $services)
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
                <a href="{{ url('/serviceAdd') }}" class="btn btn-info mb-2">Add Service</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Icon</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th colspan="3">Action</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($service as $service)
                    <tr>
                      <td>{{$service->id}}</td>
                      <td>{{$service->icon}}</td>
                      <td>{{$service->title}}</td>
                      <td>{{$service->description}}</td>
                      <td><a href="{{ URL::to('serviceView/'.$service->id) }}" class="btn btn-primary">View</a></td>
                      <td><a href="{{ URL::to('serviceEdit/'.$service->id) }}" class="btn btn-primary">Edit</a></td>
                      <td><a href="{{ url('serviceDelete/'.$service->id) }}" id="delete" class="btn btn-danger">Delete</a></td>
                      <td>@if($service->status==0)
                        <a href="{{ url('serviceActive/'.$service->id) }}" class="btn btn-info">Active</a>
                        @else <a href="{{ url('serviceDeactive/'.$service->id) }}" class="btn btn-danger">Deactive</a> @endif
                        </td>
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
