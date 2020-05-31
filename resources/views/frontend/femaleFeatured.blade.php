<!-- Featured Profile Part Start -->
<section id="featured">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title text-center">
                    <h2>Female Featured Profiles</h2>
                    <p>All Profiles Are Real and Verified, Feel Free to Contact Them</p>
                </div>
            </div>
            @foreach ($femaleFeatured as $femaleFeatured)
            @if ($femaleFeatured->gender=="Female" && $femaleFeatured->user_type=="0" && $femaleFeatured->status=="1")
            <div class="col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="{{ $femaleFeatured->avatar }}" alt="Card image cap"
                        style="height: 200px; border-radius: 8px;">
                    <div class="card-body text-center">
                        <span>Name: {{ $femaleFeatured->name }}</span>
                        <span>Age: {{ $femaleFeatured->age }}</span>
                        <span>Height: {{ $femaleFeatured->height }}</span>
                        <span>Occupation: {{ $femaleFeatured->occupation }}</span>

                        @if(Auth::check())
                        <a href="{{ url('detailsProfile/'.$femaleFeatured->id) }}" class="btn btn-primary">View Profile</a>
                        @else
                        <!-- Button trigger modal -->
                        <a class="btn btn-primary" data-toggle="modal" data-target="#login">View Profile</a>
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

