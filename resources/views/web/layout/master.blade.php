<!doctype html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        @section('style')
            <!--     Fonts and icons     -->
            <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
            <link rel="stylesheet" type="text/css"
                  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
            <!-- Slick Slider http://kenwheeler.github.io/slick/ -->
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
                <!-- Material Kit CSS -->
            {{ Html::style('css/web/material-kit.css') }}
        @show
    </head>
    <body>
        @section('navbar')
            <nav class="navbar navbar-inverse bg-dark fixed-top navbar-expand-lg" id="sectionsNav">
                <div class="container">
                    <div class="navbar-translate">
                        <a class="navbar-brand text-warning" style="font-size:25px; font-family: 'Libre Baskerville', serif;" href="{{ route('home') }}"> Quality Luxe Cars</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="tel:977075712" class="nav-link">
                                    <i class="material-icons">
                                        phone
                                    </i>
                                    <span class="text-warning">977 07 57 12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="tel:671328659" class="nav-link">
                                    <i class="material-icons">
                                        phone_android
                                    </i>
                                    <span class="text-warning">671 32 86 59</span>
                                </a>
                            </li>
                            <li class="button-container nav-item iframe-extern">
                                <a href="{{ route('contactMain') }}" class="nav-link">
                                    Contacto
                                </a>
                            </li>
                            <li class="button-container nav-item iframe-extern">
                                <a href="{{ route('aboutMain') }}" class="nav-link">
                                    Sobre nosotros
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i> Marcas
                                </a>
                                <div class="dropdown-menu dropdown-with-icons">
                                    @foreach($patentList as $patent)
                                        <a href="./index.html" class="dropdown-item">
                                            <img src="{{ asset($patent->image_url) }}" style="width: 24px;" alt="Circle Image" class="rounded-circle img-fluid"> {{ $patent->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="button-container nav-item iframe-extern">
                                <a href="{{ route('storeMain') }}" target="_blank" class="btn btn-primary btn-round btn-block">
                                    <i class="material-icons">shopping_cart</i> Vehículos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @show
        @yield('header-main')
        <div class="main main-raised @yield('section-name')">
            @yield('main')

            @section('footer')
                <footer class="footer footer-black mb-3 rounded">
                    <div class="container">
                        <a class="footer-brand text-warning" href="#">Quality Luxe Cars</a>
                        <ul class="pull-center">
                            <li>
                                <a href="tel:977075712" class="text-warning">
                                    <i class="material-icons">
                                        phone
                                    </i>
                                    977 07 57 12
                                </a>
                            </li>
                            <li>
                                <a href="tel:671328659" class="text-warning">
                                    <i class="material-icons">
                                        phone_android
                                    </i>
                                    671 32 86 59
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-warning">
                                    <i class="material-icons">
                                        place
                                    </i>
                                    N-340, 407, 43830 Torredembarra, Tarragona
                                </a>
                            </li>
                        </ul>
                        <ul class="social-buttons float-right">
                            <li>
                                <a href="#" class="btn btn-just-icon btn-white btn-link">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-just-icon btn-white btn-link">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </footer>
            @show
        </div>
        @section('javascript')
            <!--   Core JS Files   -->
            {{ Html::script('js/web/core/jquery.min.js') }}
            <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            {{ Html::script('js/web/core/popper.min.js') }}
            {{ Html::script('js/web/bootstrap-material-design.min.js') }}
            <!-- Plugin for Date Time Picker and Full Calendar Plugin-->
            {{ Html::script('js/web/plugins/moment.min.js') }}
            <!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
            {{ Html::script('js/web/plugins/bootstrap-selectpicker.js') }}
            <!-- Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
            {{ Html::script('js/web/plugins/bootstrap-tagsinput.js') }}
            <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
            {{ Html::script('js/web/plugins/jasny-bootstrap.min.js') }}
            <!-- Plugin for Small Gallery in Product Page -->
            {{ Html::script('js/web/plugins/jquery.flexisel.js') }}
            <!-- Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
            {{ Html::script('js/web/plugins/bootstrap-datetimepicker.min.js') }}
            <!-- Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
            {{ Html::script('js/web/plugins/nouislider.min.js') }}
            <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
            {{ Html::script('js/web/material-kit.js?v=2.0.0') }}
            <!-- Slick Slider http://kenwheeler.github.io/slick/ -->
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

            <script type="text/javascript">
                $('.highlight-cars-slider').slick({
                    autoplay: true,
                    autoplaySpeed: 8000,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            </script>
        @show
    </body>
</html>