<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    @section('style')
        {{ Html::style('css/bootstrap/bootstrap.css') }}
        {{ Html::style('css/admin/admin.css') }}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.6/combined/css/gijgo.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
        <style type="text/css">
            body {
                /*background: -webkit-linear-gradient(to bottom, #fff, #d95459);  !* Chrome 10-25, Safari 5.1-6 *!*/
                /*background: linear-gradient(to bottom, #fff, #f3f3f4, #d95459); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/
                /*font-family: 'Mukta Malar', sans-serif;*/
            }
        </style>
@show
<!-- Favicon icon -->
    <title>@yield('title')</title>
</head>
<body>
<div id="wrapper">
    @section('navbar')
        <nav class="navbar navbar-expand-lg navbar-light bg-white navbar-main-layout">
            <h1 class="navbar-main-title">
                <a class="navbar-brand" href="{{ route('admin.index') }}">Quality Luxe Cars</a>
            </h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.coches.index') }}"> Coches <span class="sr-only">(current)</span></a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#"> Usuarios <span class="sr-only">(current)</span></a>--}}
                    {{--</li>--}}
                </ul>
                @if( auth()->check() )
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-user"></i>{{ auth()->user()->email }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-danger"
                                 aria-labelledby="navbarDropdownMenuLink">
                                {{--<a class="dropdown-item waves-effect waves-light" href="#">Editar</a>--}}
                                <a class="dropdown-item waves-effect waves-light" href="{{ route('admin.logout') }}">Cerrar
                                    sesión</a>
                            </div>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>
    @show
</div>
<div class="container-fluid">
    @yield('body')
</div>
@section('footer')
@show
@section('javascript')
    {{ Html::script('js/bootstrap/bootstrap.js') }}
    <!-- {{ Html::script('js/waves.js') }} -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.js"></script>
    {{ Html::script('js/admin/mdb.js') }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.6/combined/js/gijgo.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@show

</body>
</html>