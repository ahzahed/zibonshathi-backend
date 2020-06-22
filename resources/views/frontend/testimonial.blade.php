<!-- Stories Part Start -->
<section id="stories">
  <div class="container str-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="title text-center title2">
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
          <div class="col-lg-8 col-md-8">
            <h3 class="text-center">Post Your Success Story!</h3>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="cmn-btn">
                @if (Auth::user())
                <a class="btn btn-primary" role="button" data-toggle="modal"
                data-target="#feedback">Feedback</a>
                <!-- Modal for feedback -->
                <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="feedLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="feedLabel">Write a feedback</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('testimonial/'.Auth::user()->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Give a feedback</label>
                                        <input type="text" class="form-control" name="testimonial" placeholder="Write a happy story">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @else
              <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register Free Now</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Common part End -->







