@extends('web.layout.master')

@section('title', 'Quality luxe cars - vehículos')

@section('style')
    @parent
@endsection
@section('header-main')
    <div class="page-header header-filter header-small bg-white" data-parallax="true"
         style="background-image: url({{ asset('images/web/main/jaguar.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title text-warning" style="font-family: 'Libre Baskerville', serif;">Quality Luxe
                        Cars</h1>
                    <h3>¿Persigues un sueño? Nosotros lo hacemos realidad.</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('section-name', 'ecommerce')
@section('main')
    <div class="section">
        <div class="container">
            <h2 class="section-title text-center text-warning">
                Nuestros vehículos
            </h2>
            @if(session()->has('alertArray'))
                @foreach (session()->get('alertArray') as $alert)
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            @include('web.modules.alert.basicAlert')
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-refine card-plain card-warning">
                        <div class="card-body">
                            <h4 class="card-title">
                                Opciones de búsqueda
                            </h4>
                            <div id="accordion" role="tablist">
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="heading-price">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapse-price" aria-expanded="true"
                                               aria-controls="collapse-price">
                                                Rango de precio
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-price" class="collapse show" role="tabpanel"
                                         aria-labelledby="heading-price">
                                        <div class="card-body card-refine">
                                            <span id="price-left" class="price-left float-left"
                                                  data-currency="€">€42</span>
                                            <span id="price-right" class="price-right float-right" data-currency="€">€880</span>
                                            <div class="clearfix"></div>
                                            <div id="slider-price"
                                                 class="slider slider-warning noUi-target noUi-ltr noUi-horizontal"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-patent"
                                               aria-expanded="false" aria-controls="collapse-patent">
                                                Marca
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-patent" class="collapse" role="tabpanel"
                                         aria-labelledby="headingTwo">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                    Todas
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Porsche
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> BMW
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Jaguar
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse-pattern"
                                               aria-expanded="false" aria-controls="collapse-pattern">
                                                Modelo
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-pattern" class="collapse" role="tabpanel"
                                         aria-labelledby="headingThree">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                    Todos
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> XE
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Panarema
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingFour">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseFour"
                                               aria-expanded="false" aria-controls="collapseFour">
                                                Color
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" role="tabpanel"
                                         aria-labelledby="headingFour">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                    Todos
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Blanco
                                                    <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-collapse">
                                        <div class="card-header" role="tab" id="heading-power">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#collapse-power" aria-expanded="false"
                                                   aria-controls="collapse-power">
                                                    Potencia (CV)
                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-power" class="collapse" role="tabpanel"
                                             aria-labelledby="heading-power">
                                            <div class="card-body card-refine">
                                                <span id="power-left" class="price-left float-left"
                                                      data-currency=""></span>
                                                <span id="power-right" class="price-right float-right"
                                                      data-currency=""></span>
                                                <div class="clearfix"></div>
                                                <div id="slider-power"
                                                     class="slider slider-warning noUi-target noUi-ltr noUi-horizontal"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-3">
                                <a href="{{ route('storeMain') }}" target="_blank" class="btn btn-primary btn-round btn-block">
                                    <i class="material-icons">search</i> Buscar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach($vehicleList as $vehicle)
                            <div class="col-md-6">
                                <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                    <div class="card-header card-header-image">
                                        <a href="{{ route('productDetails', ['idVehicle' => $vehicle->id, 'patentShortName' => $vehicle->patent->short_name, 'vehicleShortName' => $vehicle->short_name])}}">
                                            <img src="{{ asset('images/web/main/jaguar.jpg') }}" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('productDetails', ['idVehicle' => $vehicle->id, 'patentShortName' => $vehicle->patent->short_name, 'vehicleShortName' => $vehicle->short_name])}}">
                                            <h4 class="card-title text-warning">{{ $vehicle->name }}</h4>
                                        </a>
                                        <p class="description">
                                            {{ $vehicle->short_description }}
                                        </p>
                                    </div>
                                    <div class="card-footer justify-content-between">
                                        <div class="price-container">
                                            <span class="price"> {{ $vehicle->price }} €</span>
                                            <span class="price pl-2">
                                                - {{ $vehicle->km }} Km
                                            </span>
                                        </div>
                                        <div class="stats ml-auto">
                                            <a href="{{ route('productDetails', ['idVehicle' => $vehicle->id, 'patentShortName' => $vehicle->patent->short_name, 'vehicleShortName' => $vehicle->short_name])}}"
                                               rel="tooltip" title="Ver detalles de {{ $vehicle->name }}"
                                               class="btn btn-link btn-warning">
                                                Más info
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        @endforeach

                        <div class="col-md-6">
                            <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                <div class="card-header card-header-image">
                                    <a href="#">
                                        <img src="{{ asset('images/web/main/bmw.jpg') }}" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#">
                                        <h4 class="card-title text-warning">BMW</h4>
                                    </a>
                                    <p class="description">
                                        Una vez que te fijes en el BMW Serie 1 tres puertas, no podrás olvidarlo. Este
                                        llamativo modelo compacto destaca por su elegancia y deportividad realzada por
                                        su diseño atlético.
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div class="price-container">
                                        <span class="price price-old"> 38000 €</span>
                                        <span class="price price-new"> 34000 €</span>
                                    </div>
                                    <div class="stats ml-auto">
                                        <button type="button" rel="tooltip" title="" class="btn btn-link btn-warning">
                                            Más info
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            {{ $vehicleList->links() }}
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
        $(document).ready(function () {

            var sliderPrice = document.getElementById('slider-price');
            noUiSlider.create(sliderPrice, {
                start: [30000, 50000],
                connect: true,
                range: {
                    'min': [30000],
                    'max': [50000]
                }
            });

            var limitFieldMin = document.getElementById('price-left');
            var limitFieldMax = document.getElementById('price-right');

            sliderPrice.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    limitFieldMax.innerHTML = $('#price-right').data('currency') + Math.round(values[handle]);
                } else {
                    limitFieldMin.innerHTML = $('#price-left').data('currency') + Math.round(values[handle]);
                }
            });

            var sliderPower = document.getElementById('slider-power');
            noUiSlider.create(sliderPower, {
                start: [80, 600],
                connect: true,
                range: {
                    'min': [80],
                    'max': [600]
                }
            });

            var limitPowerFieldMin = document.getElementById('power-left');
            var limitPowerFieldMax = document.getElementById('power-right');

            sliderPower.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    limitPowerFieldMax.innerHTML = $('#power-right').data('currency') + Math.round(values[handle]);
                } else {
                    limitPowerFieldMin.innerHTML = $('#power-left').data('currency') + Math.round(values[handle]);
                }
            });
        });
    </script>
@endsection