<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    @section('style')
        {{ Html::style('css/bootstrap/bootstrap.css') }}
        {{ Html::style('css/admin/admin.css') }}
        <style type="text/css">
            /*
** Style Simple Ecommerce Theme for Bootstrap 4
** Created by T-PHP https://t-php.fr/43-theme-ecommerce-bootstrap-4.html
*/
footer {
    margin: 0px;
}
.bloc_left_price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 150%;
}
.category_block li:hover {
    background-color: #007bff;
}
.category_block li:hover a {
    color: #ffffff;
}
.category_block li a {
    color: #343a40;
}
.add_to_cart_block .price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 200%;
    margin-bottom: 0;
}
.add_to_cart_block .price_discounted {
    color: #343a40;
    text-align: center;
    text-decoration: line-through;
    font-size: 140%;
}
.product_rassurance {
    padding: 10px;
    margin-top: 15px;
    background: #ffffff;
    border: 1px solid #6c757d;
    color: #6c757d;
}
.product_rassurance .list-inline {
    margin-bottom: 0;
    text-transform: uppercase;
    text-align: center;
}
.product_rassurance .list-inline li:hover {
    color: #343a40;
}
.reviews_product .fa-star {
    color: gold;
}
.pagination {
    margin-top: 20px;
}
footer {
    background: #343a40;
    padding: 40px;
}
footer a {
    color: #f8f9fa!important
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
                    <a class="navbar-brand" href="{{ route('admin.index') }}">GoCoche</a>
                </h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Coches
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('coches.create') }}">Añadir</a>
                            <a class="dropdown-item" href="{{ route('coches.index') }}">Ver</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.coches.index') }}"> Coches <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.coches.index') }}"> Marcas <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.coches.index') }}"> Modelos <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Usuarios <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Estadísticas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Usuarios</a>
                            <a class="dropdown-item" href="#">Coches</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    @if( auth()->check() )
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light">
                                <i class="far fa-envelope"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-user"></i>{{ auth()->user()->email }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-danger" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item waves-effect waves-light" href="#">Editar</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ route('admin.logout') }}">Cerrar sesión</a>
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
    <!--
    <footer class="text-light bg-dark mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-4 col-xl-3">
                    <h5>About</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p class="mb-0">
                        Sección de administración de Gocoche.com
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                    <h5>Web</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><a href="">Web main page</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                    <h5>Others links</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><a href="">Link 1</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h5>Contact</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-home mr-2"></i> Web update</li>
                        <li><i class="fa fa-envelope mr-2"></i> gerardma1995@gmail.com</li>
                        <li><i class="fa fa-phone mr-2"></i> + 34 638 62 13 92</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    -->
    @show
    @section('javascript')
        {{ Html::script('js/bootstrap/bootstrap.js') }}
        <!-- {{ Html::script('js/waves.js') }} -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.js"></script>
        {{ Html::script('js/admin/mdb.js') }}
    @show
    
</body>
</html>