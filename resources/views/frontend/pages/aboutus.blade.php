@extends('frontend.app')
@section('content')
@include('frontend.menu')
<!-- About Us Part Start -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-us">
                    <div class="row">
                        <div class="col-lg-3 col-sm-7 col-md-6 mx-auto">
                            <div class="about-img">
                                <img src="{{ asset('public/frontend/images/about-img.jpg') }}" alt="about image"
                                    class="w-100">
                                <div class="about-text">
                                    <h6>Chairman & CEO</h6>
                                    <h6>Dr. Moinuddin Sarker</h6>
                                    <span>PhD, MCIC, FICER, MInstP, FARSS</span>
                                </div>
                                <div class="about-icon">
                                    <a
                                        href="https://www.linkedin.com/in/dr-moinuddin-sarker-phd-mcic-ficer-minstp-mrsc-farss-21b51810/"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.facebook.com/moinuddin.sarker"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/moin1966?lang=en"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.youtube.com/channel/UCuInQtyPE96uRO3M0x8jL6g"><i
                                            class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="about-details">
                                <h6>About Us :</h6>
                                <p>Zibonshathi is one of the service of the Noorzahan Kamal Web technology (NKWT). NKWT
                                    company operating web base service since early 2004 with full customer satisfaction.
                                </p>
                                <h6>Our Business Philosophy :</h6>
                                <p>Zibonshathi is a web based marriage introduction service. The target audience are men
                                    and women living in Bangladesh and around the world looking to marry from these
                                    countries. The site is made with careful attention to the needs and sensibilities of
                                    people of Bangladesh. Specific care is taken not to expose the contact information
                                    of the members to prevent unwanted communication and maintain privacy.</p>
                                <p>Starting in early 2020 Zibonshathi has begun requiring identity confirmation of all
                                    members including free members. This is one of the ways Zibonshathi.com is working
                                    to give its clients a safer and better experience. By preventing free searches by
                                    non members, Zibonshathi is further securing the privacy of its members and insuring
                                    that only people interested in marriage contact the members.</p>
                                <p>Payments for membership can be made through our secure payment gateway or by check to
                                    the agent closest to you. We accept Visa and Master Card. Zibonshathi uses PayPal
                                    (the best payment gateway in the world).The management of Zibonshathi is dedicated
                                    to continuing investments in technology to stay at the cutting edge and provide its
                                    members with a safe and productive experience.</p>
                                <p>A lot of effort is put into answering member queries. However the large amount of
                                    mail being presently received prevents instant response. Our current backlog is at
                                    24 to 48 hours.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Part End -->


@include('frontend.footer')
@include('frontend.copyright')
@endsection
