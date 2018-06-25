@extends('web.layout.master')

@section('title', 'Quality luxe cars')

@section('style')
    @parent
@endsection
@section('header-main')
    <div class="header">
        <!-- Carousel Card -->
        <div id="carouse-main-page" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouse-main-page" data-slide-to="0" class="active"></li>
                <li data-target="#carouse-main-page" data-slide-to="1"></li>
                <li data-target="#carouse-main-page" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="page-header header-filter"
                         style="background-image: url({{ asset('images/web/main/bmw.jpg') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h1 class="title" style="font-family: 'Libre Baskerville', serif;">Quality Luxe
                                        Cars</h1>
                                    <h4> ¿Estás buscando coche? </h4>
                                    <br>
                                    <div class="buttons">
                                        <a href="{{route('storeMain')}}" class="btn btn-primary btn-lg">
                                            Ver vehículos
                                        </a>
                                        <a href="#" class="btn btn-just-icon btn-white btn-link">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="#" class="btn btn-just-icon btn-white btn-link">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header header-filter"
                         style="background-image: url({{ asset('images/web/main/porsche.jpg') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto text-center">
                                    <h1 class="title" style="font-family: 'Libre Baskerville', serif;">Quality Luxe
                                        Cars</h1>
                                    <h6>¡Conecta con nosotros!</h6>
                                    <div class="buttons">
                                        <a href="#" class="btn btn-white btn-link btn-lg">
                                            <i class="material-icons">share</i> Compartir
                                        </a>
                                        <a href="{{route('storeMain')}}" class="btn btn-primary btn-lg">
                                            <i class="material-icons">shopping_cart</i> Vehículos
                                        </a>
                                    </div>
                                    <div class="buttons">
                                        <a href="#" class="btn btn-just-icon btn-white btn-link btn-lg">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                        <a href="#" class="btn btn-just-icon btn-white btn-link btn-lg">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header header-filter"
                         style="background-image: url({{ asset('images/web/main/mercedes.jpg') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 ml-auto text-right">
                                    <h1 class="title" style="font-family: 'Libre Baskerville', serif;">Quality Luxe
                                        Cars</h1>
                                    <h4></h4>
                                    <br>
                                    <div class="buttons">
                                        <a href="#" class="btn btn-white btn-link btn-lg">
                                            <i class="material-icons">share</i> Compartir
                                        </a>
                                        <a href="{{route('storeMain')}}" class="btn btn-primary btn-lg">
                                            <i class="material-icons">shopping_cart</i> Ver más
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouse-main-page" role="button" data-slide="prev">
                <i class="material-icons">keyboard_arrow_left</i>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouse-main-page" role="button" data-slide="next">
                <i class="material-icons">keyboard_arrow_right</i>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
        <!-- End Carousel Card -->
    </div>
@endsection
@section('main')
    <div class="section rounded">
        @if($vehicleHighlightedList->isNotEmpty())
        <h2 class="section-title text-center text-warning">
            <i class="material-icons">
                stars
            </i>
            Vehículos destacados
            <i class="material-icons">
                stars
            </i></h2>
        <div class="row">
            <div class="col-md-11 col-10 mx-auto">
                @include('web.modules.sliders.highlightCars')
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-10 col-md-6 mx-auto">
                <a class="btn btn-primary btn-block btn-round" href="{{route('storeMain')}}">Ver todos los vehículos</a>
            </div>
        </div>
        <div class="container">
            <div class="features-1">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">¿Por qué elegirnos?</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Financiamento</h4>
                            <p>Nuestro departamento de finanzas le ayudara a encontrar soluciones financieras para
                                ahorrarle dinero.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-warning">
                                <i class="material-icons">time_to_leave</i>
                            </div>
                            <h4 class="info-title">Amplia gama de marcas</h4>
                            <p>Con una sólida selección de vehículos populares disponibles, así como vehículos líderes
                                de BMW, Mercedes, entre otros.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">sentiment_very_satisfied</i>
                            </div>
                            <h4 class="info-title">Confianza de nuestros clientes</h4>
                            <p>La satisfacción de el cliente es una de nuestras principales prioridades, así lo
                                demuestra la confianza depositada por nuestra comunidad de compradores</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Ventajas destacadas</h4>
                            <p>Garantía incluida en todos nuestros vehículos.</p>
                            <p>Adquisición de vehículos a la carta.</p>
                            <p>Posibilidad de transporte.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
@endsection