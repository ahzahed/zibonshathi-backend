@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Blog Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">

                <a href="{{ url('/addBlog') }}" class="btn btn-info mb-2">Add Blog</a>
                <a href="{{url('/blog')}}" class="btn btn-warning mb-2"><< Back</a>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Blog ID</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($trash as $trash)
                    <tr>
                      <td>{{$trash->id}}</td>
                      <td><img
                        src="{{ $trash->image }}" style="height:40px; width:40px !important;"
                        alt="image"
                        class="img-fluid w-100"
                      /></td>
                      <td>{{$trash->title}}</td>
                      <td>{{$trash->description}}</td>
                      <td><a href="{{ url('blogForceDelete/'.$trash->id) }}" id="delete" class="btn btn-danger">Delete</a></td>
                      <td><a href="{{ url('blogRestore/'.$trash->id) }}" id="delete" class="btn btn-warning">Restore</a></td>
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
