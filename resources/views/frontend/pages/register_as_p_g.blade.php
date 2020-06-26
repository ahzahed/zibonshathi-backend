@extends('frontend.app')
@include('frontend.menu')
@section('content')
<!-- Registration Part Start -->
<section id="registration">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="regis-form">
          <div class="regis-img text-center">
            <img src="{{ asset('public/frontend/images/zibonshathi.png') }}" alt="logo" style="height: 100px;">
          </div>

                    <form method="POST" action="{{ route('register_as_p_g_store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="userphone">{{ __('Phone Number') }}</label>

                                <input id="userphone" type="number" class="form-control @error('userphone') is-invalid @enderror" name="userphone" value="{{ old('userphone') }}" required autocomplete="userphone">

                                @error('userphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>


                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>


                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>

                        <div class="regis-btn text-center">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                        </div>
                    </form>
                    <div class="already text-center">
                        <h6>Already a Member?</h6>
                        <a class="nav-link" href="{{ route('login') }}" data-toggle="modal"
                        data-target="#login">{{ __('Login') }} <i class="fas fa-chevron-down"></i><span
                            class="sr-only">(current)</span></a>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!--Login Modal -->
<div class="login-modal">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginLabel"><img
                            src="{{ asset('public/frontend/images/zibonshathi.png') }}" alt="logo"
                            style="width: 130px; height: 65px;"></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="welcome">
                        <h2>Welcome back! Please Login</h2>
                    </div>
                    <div class="form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="forget">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="forget">
                                <p><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p>
                            </div>
                            @endif
                            <button type="submit" class="log btn btn-primary">{{ __('Login') }}</button>
                        </form>
                        <p>New to Zibonshathi?</p>
                        <div class="reg">
                            <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.copyright')

@endsection

