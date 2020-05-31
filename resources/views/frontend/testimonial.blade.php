<!-- Stories Part Start -->
<section id="stories">
  <div class="container str-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="title text-center">
          <h2 class="title-head">Thousand Of Success Stories</h2>
        </div>
      </div>
      @foreach ($testimonial as $testimonial)
      <div class="col-lg-6">
        <div class="str-contents text-center">
          <img src="{{ asset($testimonial->avatar) }}" alt="img" class="img-border">
          <p>{{ $testimonial->testimonial }}</p>
          <h3>{{ $testimonial->name }}</h3>
        </div>
      </div>
      @endforeach
    </div>
    <div class="col-lg-12">
      <div class="view-all text-center">
        <a href="#" class="btn btn-primary">View All</a>
      </div>
    </div>
  </div>
</section>
<!-- Stories Part End -->

<!-- Common part Start -->
<section id="common">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="row">
          <div class="col-lg-8">
            <h3 class="text-center">Post Your Success Story!</h3>
          </div>
          <div class="col-lg-4">
            <div class="cmn-btn">
              <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register Free Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Common part End -->
