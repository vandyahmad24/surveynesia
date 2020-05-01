
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="No 1 Platform Survey di Indonesia">
    <meta name="author" content="Surveynesia">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="2_yEKxNVC8CrhqVENd6pJq_m7NBbpuLqwxUJ361164A" />
    <title>@yield('title')</title>
    <!-- Preloader -->
    <style>
        @keyframes hidePreloader {
            0% {
                width: 100%;
                height: 100%;
            }

            100% {
                width: 0;
                height: 0;
            }
        }

        body>div.preloader {
            position: fixed;
            background: white;
            width: 100%;
            height: 100%;
            z-index: 1071;
            opacity: 0;
            transition: opacity .5s ease;
            overflow: hidden;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body:not(.loaded)>div.preloader {
            opacity: 1;
        }

        body:not(.loaded) {
            overflow: hidden;
        }

        body.loaded>div.preloader {
            animation: hidePreloader .5s linear .5s forwards;
        }
    </style>
    <script>
        window.addEventListener("load", function() {
            setTimeout(function() {
                document.querySelector('body').classList.add('loaded');
            }, 300);
        });
    </script>
    <!-- Favicon -->
   <link rel="icon" href="{{asset('logo_survey.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{asset('tema/assets/libs/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <!-- Quick CSS -->
    <link rel="stylesheet" href="{{asset('tema/assets/css/quick-website.css')}}" id="stylesheet">
</head>

<body>
 
    <!-- Go Pro -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{route('home')}}">
                <img alt="Image placeholder" src="{{asset('logo.png')}}" style="width: 250px; height: 50px;" id="navbar-logo">
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mt-4 mt-lg-0 ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                   
                   

                </ul>
                @if (Route::has('login'))
                <!-- Button -->
                @auth
                 <a class="navbar-btn btn btn-sm btn-primary d-none d-lg-inline-block ml-3" href="{{ route('logout') }}"
	               onclick="event.preventDefault();
	                             document.getElementById('logout-form').submit();">
	                {{ __('Logout') }} 
	            </a>

	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                @csrf
	            </form>
                @if(Auth::user()->level=='admin')
                <a class="navbar-btn btn btn-sm btn-warning ml-3 d-none d-lg-inline-block" href="{{route('admin')}}">
                   Masuk Halaman Admin
                </a>
                @elseif(Auth::user()->level=='mitra')
                <a class="navbar-btn btn btn-sm btn-warning  ml-3 d-none d-lg-inline-block" href="{{route('mitra')}}">
                   Masuk Halaman Mitra
                </a>
                @elseif(Auth::user()->level=='operasional')
                <a class="navbar-btn btn btn-sm btn-warning  ml-3 d-none d-lg-inline-block" href="{{route('operasional')}}">
                   Masuk Halaman Operasional
                </a>
                @else
                <a class="navbar-btn btn btn-sm btn-warning  ml-3 d-none d-lg-inline-block" href="{{route('user')}}">
                   Masuk Halaman user
                </a>
                @endif

	            @else
                <a class="navbar-btn btn btn-sm btn-primary d-none d-lg-inline-block ml-3" href="{{ route('login') }}">
                    Login
                </a>
                <a class="navbar-btn btn btn-sm btn-warning d-none d-lg-inline-block" href="{{ route('register') }}">
                   Register
                </a>
                @endauth
                @endif
                <!-- Mobile button -->
                <div class="d-lg-none text-center">
                 @if (Route::has('login'))
                <!-- Button -->
                @auth
                 <a class="btn btn-block btn-sm btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} 
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @if(Auth::user()->level=='admin')
                <a class="btn btn-block btn-sm btn-primary" href="{{route('admin')}}">
                   Masuk Halaman Admin
                </a>
                @elseif(Auth::user()->level=='mitra')
                <a class="btn btn-block btn-sm btn-primary" href="{{route('mitra')}}">
                   Masuk Halaman Mitra
                </a>
                @elseif(Auth::user()->level=='operasional')
                <a class="navbar-btn btn btn-sm btn-warning  ml-3 d-none d-lg-inline-block" href="{{route('operasional')}}">
                   Masuk Halaman operasional
                </a>
                @else
                <a class="btn btn-block btn-sm btn-primary" href="{{route('user')}}">
                   Masuk Halaman user
                </a>
                @endif

                @else
                <a class="btn btn-block btn-sm btn-warning ml-2" href="{{ route('login') }}">
                    Login
                </a>
                <a class="btn btn-block btn-sm btn-primary" href="{{ route('register') }}">
                   Register
                </a>
                @endauth
                @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
  	@yield('tema')
    <footer class="position-relative" id="footer-main">
        <div class="footer pt-lg-7 footer-dark bg-dark">
            <!-- SVG shape -->
            <div class="shape-container shape-line shape-position-top shape-orientation-inverse">
                <svg width="2560px" height="100px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none" x="0px" y="0px" viewBox="0 0 2560 100" style="enable-background:new 0 0 2560 100;" xml:space="preserve" class=" fill-section-secondary">
                    <polygon points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <!-- Footer -->
            <div class="container pt-4">
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <!-- Theme's logo -->
                        <a href="{{route('home')}}">
                            <img alt="Image placeholder" src="{{asset('logo.png')}}" style="width:250px;" id="footer-logo">
                        </a>
                        <!-- Webpixels' mission -->
                        <p class="mt-4 text-sm opacity-8 pr-lg-4">Terimakasih sudah mengunjungi website kami .</p>
                        <!-- Social -->
                    </div>
                    <div class="col-lg-2 col-6 col-sm-4 mb-5 mb-lg-0">
                        {{-- <h6 class="heading mb-3">About</h6>
                        <ul class="list-unstyled">
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul> --}}
                    </div>
                   
                </div>
                <hr class="divider divider-fade divider-dark my-4">
                <div class="row align-items-center justify-content-md-between pb-4">
                    <div class="col-md-6">
                        <div class="copyright text-sm font-weight-bold text-center text-md-left">
                            &copy; 2020 <a href="https://surveynesia.id" class="font-weight-bold" target="_blank">Surveynesia</a>. All rights reserved
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </footer>
    <!-- Core JS  -->
    <script src="{{asset('tema/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('tema/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('tema/assets/libs/svg-injector/dist/svg-injector.min.js')}}"></script>
    <script src="{{asset('tema/assets/libs/feather-icons/dist/feather.min.js')}}"></script>
    <!-- Quick JS -->
    <script src="{{asset('tema/assets/js/quick-website.js')}}"></script>
    <!-- Feather Icons -->
    <script>
        feather.replace({
            'width': '1em',
            'height': '1em'
        })
    </script>
</body>

</html>