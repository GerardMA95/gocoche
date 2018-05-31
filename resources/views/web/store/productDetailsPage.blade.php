@extends('web.layout.master')

@section('title', 'Quality luxe cars')

@section('style')
    @parent
@endsection
@section('header-main')
    <div class="page-header header-filter header-small bg-white" data-parallax="true" style="background-image: url({{ asset('images/web/main/jaguar.jpg') }});">
    </div>
@endsection
@section('section-name', 'product-page')
@section('main')
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-6">
                    <div class="tab-content">
                        <div class="tab-pane active" id="product-page2">
                            <img src="{{ asset('images/web/main/porsche.jpg') }}">
                        </div>
                        <div class="tab-pane" id="product-page3">
                            <img src="{{ asset('images/web/main/bmw.jpg') }}">
                        </div>
                        <div class="tab-pane" id="product-page4">
                            <img src="{{ asset('images/web/main/jaguar.jpg') }}">
                        </div>
                    </div>
                    <ul class="nav flexi-nav" data-tabs="tabs" id="product-images">
                        <li class="nav-item">
                            <a href="#product-page2" class="nav-link" data-toggle="tab">
                                <img src="{{ asset('images/web/main/porsche.jpg') }}">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#product-page3" class="nav-link" data-toggle="tab">
                                <img src="{{ asset('images/web/main/bmw.jpg') }}">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#product-page4" class="nav-link" data-toggle="tab">
                                <img src="{{ asset('images/web/main/jaguar.jpg') }}">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2 class="title text-warning"> Jaguar XE </h2>
                    <h3 class="main-price">48.000 € </h3>
                    <div id="accordion" role="tablist">
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Características
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="col-md-12 mr-auto ml-auto stats">
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fas fa-2x fa-tachometer-alt"></i>
                                                <b class="text-warning">Diésel</b>
                                            </li>
                                            <hr>
                                            <li>
                                                <i class="fas fa-2x fa-bolt"></i>
                                                <b class="text-warning">Tracción delantera</b>
                                            </li>
                                            <hr>
                                            <li>
                                                <i class="fas fa-2x fa-paint-brush"></i>
                                                <b class="text-warning">Blanco perla</b>
                                            </li>
                                            <hr>
                                            <li>
                                                <i class="fas fa-2x fa-tachometer-alt"></i>
                                                <b class="text-warning">Cambio Manual 6 marchas</b>
                                            </li>
                                            <hr>
                                            <li>
                                                <i class="fas fa-2x fa-fire"></i>
                                                <b class="text-warning">160 CV</b>
                                            </li>
                                            <hr>
                                            <li>
                                                <i class="fas fa-2x fa-tachometer-alt"></i>
                                                <b class="text-warning">55000 Kilometros</b>
                                            </li>
                                            <hr>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pull-right">
                        <button class="btn btn-primary btn-round mx-auto">Llamar<i class="material-icons">phone</i></button>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <div id="navigation-pills">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#dashboard-2" role="tab" data-toggle="tab">
                                                <i class="material-icons">comment</i> Visión general del vehículo
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#schedule-2" role="tab" data-toggle="tab">
                                                <i class="material-icons">schedule</i> Localización
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="dashboard-2">
                                            <p class="">
                                                PORSCHE MACAN S DIESEL AUTOMATICO
                                                <br>
                                                02.02.2015 268CV
                                                <br>
                                                AUTOMATICO 7 TRONIC 55600 KM
                                                <br>
                                                BLANCO IBISSWEISS
                                                <br>
                                                NAVEGADOR PCM PORSCHE
                                                <br>
                                                SUSPENSION SPORT
                                                <br>
                                                LLANTAS DE 21″
                                                <br>
                                                PORTON TRASERO ELECTRICO
                                                <br>
                                                CRISTALES TRASEROS TINTADOS
                                                <br>
                                                BIXENON CON LUZ ADAPTATIVA EN CURVA
                                                <br>
                                                LEDS
                                                <br>
                                                SENSORES DE LLUVIA Y LUCES AUT
                                                <br>
                                                VOLANTE MULTIFUNCION CON LEVAS EN EL VOLANTE
                                                <br>
                                                HIFI SOUND SISTEM
                                                <br>
                                                ASIENTOS DE PIEL DEPORTIVOS HERGONOMICOS ENVOLVENTES CON MEMORIA
                                                <br>
                                                KLIMA BIZONAL
                                                <br>
                                                MP4
                                                <br>
                                                ALARMA
                                                <br>
                                                SENSORES DE APARCAMIENTO DEL Y TRAS
                                                <br>
                                                CONDUCCION SPORT
                                                <br>
                                                RETROVISORES ELECTRICO AUT
                                                <br>
                                                GARANTIA PORSCHE
                                                <br>
                                                LIBRO DE MANTENIMIENTO PORSCHE
                                                <br>
                                                ASIENTOS CALEFACTABLES
                                                <br>
                                                COMO NUEVO
                                            </p>
                                            <hr>
                                        </div>
                                        <div class="tab-pane" id="schedule-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <img src="{{ asset('images/web/main/testMap.jpg') }}" alt="Rounded Image" class="rounded img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('javascript')
    @parent
    <script>
        $(document).ready(function() {
            $("#product-images").flexisel({
                visibleItems: 4,
                itemsToScroll: 1,
                animationSpeed: 400,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 3
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 3
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });
        });
    </script>
@endsection