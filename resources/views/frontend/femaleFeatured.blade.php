<!-- Featured Female Profile Part Start -->
<section id="featured2">
    <div class="container common-card-item">
        <div class="row">
            <div class="col-lg-12">
                <div class="title text-center">
                    <h2>All Female Profiles Featured</h2>
                    <p>All Profiles Are Real and Verified, Feel Free to Contact Them</p>
                </div>
            </div>
            @foreach ($femaleFeatured as $femaleFeatured)
            @if ($femaleFeatured->gender=="Female" && $femaleFeatured->user_type=="0" && $femaleFeatured->status=="1")
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="{{ $femaleFeatured->avatar }}" alt="Card image cap"
                        style="height: 220px; border-radius: 8px;">
                    <div class="card-body text-center">
                        <span>Name: {{ $femaleFeatured->name }}</span>
                        <span>Age: {{ $femaleFeatured->age }}</span>
                        <span>Height: {{ $femaleFeatured->height }}</span>
                        <span>Religion: {{ $femaleFeatured->religion }}</span>
                        @if (Auth::check())
                        <a href="{{ url('detailsProfile/'.Crypt::encrypt($femaleFeatured->id)) }}" class="btn btn-primary text-white">View
                            Profile</a>
                        @else
                        <a data-toggle="modal" data-target="#login" class="btn btn-primary text-white">View Profile</a>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            <div class="col-lg-12">
                <div class="view-all text-center">
                    <a href="{{ url('allFemaleProfile') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Female Profile Part End -->
