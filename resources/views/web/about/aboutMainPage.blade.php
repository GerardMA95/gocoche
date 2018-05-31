@extends('web.layout.master')

@section('title', 'Quality luxe cars')

@section('style')
    @parent
@endsection
@section('header-main')
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url({{ asset('images/web/main/aboutUs.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">Sobre nosotros</h1>
                    <h4>¿Persigues un sueño? Nosotros lo hacemos realidad.</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('section-name', 'about-us')
@section('main')
    <div class="container">
        <div class="about-description text-center">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h5 class="description">Con especialistas a su disposición para ayudarle en cualquier parte de la experiencia de compra de automóviles o propiedad de vehículos, Quality Cars ofrece financiamiento, servicio de entrega, una selección de vehículos para compradores de automóviles de lujo en Torredembarra, Tarragona, y un gran abanico de servicios a disposición de todos nuestros clientes.</h5>
                </div>
            </div>
        </div>
        <div class="about-team">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">Bienvenido a <span class="text-warning" style="font-family: 'Libre Baskerville', serif;">Quality Luxe Cars</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                            <a href="#">
                                <img class="img" src="../assets/img/faces/marc.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Juanjo Rebollo</h4>
                            <h6 class="category text-muted">Gerente / Manager</h6>
                            <p class="card-description">
                                Texto descriptivo Texto descriptivo Texto descriptivo Texto descriptivo
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                            <a href="#">
                                <img class="img" src="../assets/img/faces/christian.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Diego</h4>
                            <h6 class="category text-muted">Comercial</h6>
                            <p class="card-description">
                                Texto descriptivo Texto descriptivo Texto descriptivo
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="projects-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">Nuestras ventajas</h2>
                        <div class="section-space"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 ml-auto">
                        <div class="card card-background" style="background-image:url({{ asset('images/web/main/porsche.jpg') }})">
                            <div class="card-body">
                                <span class="badge badge-rose">Client: Apple</span>
                                <a href="#">
                                    <h3 class="card-title">Beautiful Project</h3>
                                </a>
                                <p class="card-description">
                                    Don't be scared of the truth because we need to restart the human foundation in truth.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mr-auto">
                        <div class="info info-horizontal">
                            <div class="icon icon-success">
                                <i class="material-icons">check</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Posibilidad financiación a medida.</h4>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-success">
                                <i class="material-icons">check</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Una gran selección de vehículos PREMIUM</h4>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-success">
                                <i class="material-icons">check</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Posibilidad de ofertar su vehículo en nuestra web.</h4>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-success">
                                <i class="material-icons">check</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Garantía incluida.</h4>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-success">
                                <i class="material-icons">check</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Compra de vehículos a la carta.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="about-office">
            <div class="row text-center">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title">Nuestro concesionario</h2>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
@endsection