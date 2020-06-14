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
                {{-- @forelse($testimonial as $testimonials)
                <span class="badge badge-secondary">
                {{ $loop->count }}
                @break
            </span>
            @empty
            <span class="badge badge-danger">
                No Message Today
            </span>
                 @endforelse --}}
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
                      <th>Payment ID</th>
                      <th>Paying Amount</th>
                      <th>Blance Transection</th>
                      <th>Payment Date</th>
                      <th>Payment Expired</th>
                      <th>Action</th>
                      <th>Account Staus</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($payment as $payment)
                    <tr>
                      <td>{{$payment->id}}</td>
                      <td>{{$payment->name}}</td>
                      <td>{{$payment->email}}</td>
                      <td>{{$payment->payment_id}}</td>
                      <td>{{($payment->paying_amount)/100}}</td>
                      <td>{{$payment->blnc_transection}}</td>
                      <td>{{$payment->payment_date}}</td>
                      <td>{{$payment->payment_exp}}</td>
                      <td><a class="btn btn-danger" href="{{ url('paymentDelete/'.$payment->id) }}">Delete</a></td>
                      @if ($payment->payment_exp < Carbon\Carbon::now())
                      <td class="text-danger">Expired</td>
                      @else
                      <td>Active</td>
                      @endif

                      {{-- <td>@if($testimonial->testimonial != " ")
                        <a href="{{ url('testimonialDelete/'.$testimonial->id) }}" class="btn btn-danger">Delete</a>
                         @endif
                        </td> --}}
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
