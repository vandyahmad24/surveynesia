<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="No 1 Platform Survey di Indonesia">
    <meta name="author" content="Surveynesia">
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
    <link rel="icon" href="{{asset('logo_survey.png')}}" type="image/png"><!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('tema/assets/libs/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <!-- Quick CSS -->
    <link rel="stylesheet" href="{{asset('tema/assets/css/quick-website.css')}}" id="stylesheet">
</head>

<body>
    <!-- Main content -->
    <!-- Go back -->
    <a href="{{route('home')}}" class="btn btn-white btn-icon-only rounded-circle position-absolute zindex-101 left-4 top-4 d-none d-lg-inline-flex" data-toggle="tooltip" data-placement="right" title="Go back">
        <span class="btn-inner--icon">
            <i data-feather="arrow-left"></i>
        </span>
    </a>
    <!-- Side cover login -->
    <section>
        <div class="bg-primary position-absolute h-100 top-0 left-0 zindex-100 col-lg-6 col-xl-6 zindex-100 d-none d-lg-flex flex-column justify-content-end" data-bg-size="cover" data-bg-position="center">
            <!-- Cover image -->
            <img src="{{asset('tema/assets/img/theme/light/img-v-2.jpg')}}" alt="Image" class="img-as-bg">
            <!-- Overlay text -->
            <div class="row position-relative zindex-110 p-5">
                <div class="col-md-8 text-center mx-auto">
                    <span class="badge badge-warning badge-pill">Surveynesia</span>
                    <h5 class="h5 text-white mt-3">Selamat Datang di Surveynesia</h5>
                    <p class="text-white opacity-8">
                     
                    </p>
                </div>
            </div>
        </div>
   @yield('content');
    </section>
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