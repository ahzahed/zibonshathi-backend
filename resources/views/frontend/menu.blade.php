<!-- Navbar Part Star -->
<nav class="navbar nav-bg navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('public/frontend/images/zibonshathi.png') }}"
                alt="logo" style="width: 140px; height: 75px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" data-toggle="modal"
                        data-target="#login">{{ __('Login') }} <i class="fas fa-chevron-down"></i><span
                            class="sr-only">(current)</span></a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        @if (Auth::user()->user_type=="0")
                        <a class="dropdown-item" href="{{ route('viewProfile') }}">View Profile</a>
                        @elseif (Auth::user()->user_type=="5")
                        <a class="dropdown-item" href="{{ route('viewProfile') }}">View Profile</a>
                        @elseif (Auth::user()->user_type=="1" || Auth::user()->user_type=="2")
                        <a class="dropdown-item" href="{{ route('home') }}">Admin Panel</a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-headset help"></i> Help <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/helpdesk') }}">Help Desk</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#contact">Send Message</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


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
                        <div class="text-center pt-3">
                            <a href="{{ url('/auth/redirect/google') }}" style="border-right: 1px solid black;" class="pr-2">Gmail</a>
                            <a href="{{ url('/login/facebook') }}">Facebook</a>
                        </div>
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


<!--Contact Modal -->
<div class="contact-modal">
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactLabel"><img
                            src="{{ asset('public/frontend/images/zibonshathi.png') }}" alt="logo"
                            style="width: 130px; height: 65px;"></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <form action="{{ url('/contact') }}" method="POST">
                            @csrf
                            <div class="row mrr">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('fname') is-invalid @enderror"
                                            name="fname" placeholder="First name" />
                                        @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" name="lname"
                                            class="form-control @error('lname') is-invalid @enderror"
                                            placeholder="Last name" />
                                        @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email"
                                    class="form-control @error('lname') is-invalid @enderror"
                                    placeholder="Your Email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                placeholder="Your Message..."></textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="reg pt-2">
                                <button class="btn btn-primary" type="submit">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar Part End -->
