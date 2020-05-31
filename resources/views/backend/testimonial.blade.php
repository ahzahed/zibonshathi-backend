@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Feedback Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Todays Feedback
                @forelse($testimonial as $testimonials)
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
                      <th>Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($testimonial as $testimonial)
                    <tr>
                      <td>{{$testimonial->id}}</td>
                      <td>{{$testimonial->name}}</td>
                      <td>{{$testimonial->testimonial}}</td>
                      <td><a href="">View</a></td>
                      <td>@if($testimonial->testimonial != " ")
                        <a href="{{ url('testimonialDelete/'.$testimonial->id) }}" class="btn btn-danger">Delete</a>
                         @endif
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
