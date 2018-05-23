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
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
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
                <div class="col-md-6 col-sm-6">
                    <h2 class="title text-warning"> Jaguar XE </h2>
                    <h3 class="main-price">48.000 € </h3>
                    <div id="accordion" role="tablist">
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Descripción
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p>La imagen enérgica y la agilidad en carretera del XE lo identifican al instante como un Jaguar. Se comporta como un Jaguar, se conduce como un Jaguar. El XE es Jaguar de principio a fin.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Detalles
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">

                                    <ul>
                                        <li>Manual 6 marchas</li>
                                        <li>Diésel</li>
                                        <li>Tracción delantera</li>
                                        <li>84% cotton, 14% nylon, 2% elastane</li>
                                        <li>Dry clean</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pick-size">
                        <div class="col-md-6 col-sm-6">
                            <label>Select color</label>
                            <select class="selectpicker" data-style="select-with-transition" data-size="7">
                                <option value="1">Rose </option>
                                <option value="2">Gray</option>
                                <option value="3">White</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>Select size</label>
                            <select class="selectpicker" data-style="select-with-transition" data-size="7">
                                <option value="1">Small </option>
                                <option value="2">Medium</option>
                                <option value="3">Large</option>
                            </select>
                        </div>
                    </div>
                    <div class="row pull-right">
                        <button class="btn btn-primary btn-round mx-auto">Llamar<i class="material-icons">phone</i></button>
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