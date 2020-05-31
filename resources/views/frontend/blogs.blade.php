<!--Blogs part start -->
<section id="blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="head text-center">
          <h2 style="border-bottom: 3px solid #f35c00;">
            Our Blogs
            <!-- <span style="color: #cb4561;">Blogs</span> -->
          </h2>
        </div>
      </div>
    </div>
    <div class="row blog-slider">
        @foreach ($blog as $blog)
      <div class="col-lg-4">
        <div class="card">
          <div class="card__image">
            <img
              src="{{ $blog->image }}"
              alt="image"
              class="img-fluid w-100"
            />
          </div>
          <div class="card__content card__padding">
            <div class="card__share">
              <div class="card__social">
                <a class="share-icon facebook" href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="share-icon twitter" href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="share-icon googleplus" href="#"
                  ><i class="fab fa-google-plus-g"></i
                ></a>
              </div>
              <a id="share" class="share-toggle share-icon" href="#"
                ><i class="fas fa-share-alt"></i
              ></a>
            </div>
            <article class="card__article">
              <h5>{{ $blog->title }}</h5>
              <p>
                {{ $blog->description }}
              </p>
            </article>
          </div>
          <div class="card__action">
            <div class="card__author">
              <img src="public/Frontend/images/blogs.jpg" alt="user" class="img-fluid" />
              <div class="card__author-content">
                <p>By <span>John Alex</span></p>
                <time>Oct 2018</time>
              </div>
            </div>
            <button type="button" class="btn-bg">Read More</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!--Blogs part end -->
