<!-- Service Part Start -->
<section id="service">
  <div class="container service-contents">
    <div class="row">
      <div class="col-lg-12">
        <div class="title text-center">
          <h2 class="title-head">Zibonshathi Services</h2>
          <p class="title-head">Our Best Services</p>
        </div>
      </div>
      @foreach ($service as $services)
      @if ($services->status == 1)
      <div class="col-lg-3 col-sm-6">
        <div class="service-content text-center">
            {!! $services->icon !!}
          <h3>{{ $services->title }}</h3>
          <p>{{ $services->description}}</p>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</section>
<!-- Service Part End -->

<!-- Common part Start -->
<section id="common" @if (Auth::user()) class="d-none" @endif>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="row">
          <div class="col-lg-9 col-12 col-md-9">
            <h3 class="text-center">Register Free to find your Perfect Match!</h3>
          </div>
          <div class="col-lg-3 col-12 col-md-3">
            <div class="cmn-btn">
              <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Common part End -->


