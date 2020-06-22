@extends('frontend.app')

@include('frontend.menu')

<!-- Membership Part Start -->
<section id="membership">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-8 mx-auto">
        <div class="plan-content">
          <div class="plan-img">
            <img src="{{ asset('public/frontend/images/basic.png') }}" alt="img">
          </div>
          <h3 class="text-center">Basic</h3>
          <h4 class="text-center">BDT 2000.00</h4>
          <div class="body text-center">
            <span><i class="far fa-check-circle"></i>Duration 7 Days</span>
            <span><i class="far fa-check-circle"></i>See Contact Details</span>
            <span><i class="far fa-check-circle"></i>Private Chating</span>
            <span><i class="far fa-check-circle"></i>Total 50 Proposals</span>
            <span><i class="far fa-check-circle"></i>Send Per Day 4 Proposals</span>
            <span><i class="far fa-check-circle"></i>Contact View Limit 10</span>
            <span><i class="far fa-check-circle"></i>24/7 Customer Support</span>
          </div>
          <p class="text-center">Looking for additional discount?</p>
          <div class="cmn-btn text-center">
            <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-8 mx-auto">
        <div class="plan-content">
          <h5>Recommended</h5>
          <div class="plan-img">
            <img src="{{ asset('public/frontend/images/standard.png') }}" alt="img">
          </div>
          <h3 class="text-center">Standard</h3>
          <h4 class="text-center">BDT 3500.00</h4>
          <div class="body text-center">
            <span><i class="far fa-check-circle"></i>Duration 30 Days</span>
            <span><i class="far fa-check-circle"></i>See Contact Details</span>
            <span><i class="far fa-check-circle"></i>Private Chating</span>
            <span><i class="far fa-check-circle"></i>Total 70 Proposals</span>
            <span><i class="far fa-check-circle"></i>Send Per Day 6 Proposals</span>
            <span><i class="far fa-check-circle"></i>Contact View Limit 20</span>
            <span><i class="far fa-check-circle"></i>24/7 Customer Support</span>
          </div>
          <p class="text-center">Looking for additional discount?</p>
          <div class="cmn-btn text-center">
            <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-8 mx-auto">
        <div class="plan-content">
          <div class="plan-img">
            <img src="{{ asset('public/frontend/images/premium.png') }}" alt="img">
          </div>
          <h3 class="text-center">Premium</h3>
          <h4 class="text-center">BDT 5500.00</h4>
          <div class="body text-center">
            <span><i class="far fa-check-circle"></i>Duration 365 Days</span>
            <span><i class="far fa-check-circle"></i>See Contact Details</span>
            <span><i class="far fa-check-circle"></i>Private Chating</span>
            <span><i class="far fa-check-circle"></i>Total 100 Proposals</span>
            <span><i class="far fa-check-circle"></i>Send Per Day 8 Proposals</span>
            <span><i class="far fa-check-circle"></i>Contact View Limit 40</span>
            <span><i class="far fa-check-circle"></i>24/7 Customer Support</span>
          </div>
          <p class="text-center">Looking for additional discount?</p>
          <div class="cmn-btn text-center">
            <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Membership Part End -->

@include('frontend.copyright')

