@extends('backend.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Package Price</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                @foreach($package as $packages)
                <form action="{{ URL::to('packageUpdate/'.$packages->id) }}" class="form-inline" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                      {{-- <input type="text" readonly class="form-control" value="{{ $packages->valid }} days"> --}}
                      <span class="font-weight-bold">Days: </span><input type="number" name="valid" value="{{ $packages->valid }}" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <span class="font-weight-bold">Price($): </span><input type="number" name="price" value="{{ $packages->price }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                  </form>
                  @endforeach
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Package</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($package as $packageVaule)

                    <tr>
                      <td>{{$packageVaule->id}}</td>
                      <td>{{ $packageVaule->valid }} days</td>
                      <td>{{$packageVaule->price}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Coupon Table</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <form action="{{ URL::to('add_coupon') }}" class="form-inline" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                      <input type="text" name="coupon" class="form-control @error('coupon') is-invalid @enderror" placeholder="Coupon Code">
                      @error('coupon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" placeholder="Discount Price">
                      @error('discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add Coupon</button>
                  </form>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Coupon Name</th>
                      <th>Discount Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($coupon as $coupon)
                    <tr>
                        <td>{{$coupon->coupon}}</td>
                        <td>{{$coupon->discount}}</td>
                        <td>@if($coupon->coupon_status==0)
                          <a href="{{ url('couponActive/'.$coupon->id) }}" class="btn btn-info">Active</a>
                          @else <a href="{{ url('couponDeactive/'.$coupon->id) }}" class="btn btn-danger">Deactive</a> @endif
                          </td>
                          <td><a href="{{ url('couponDelete/'.$coupon->id) }}" id="delete" class="btn btn-danger">Delete</a></td>
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
