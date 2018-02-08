@extends('admin.layout.master')

@section('title', 'Gocoche')

@section('style')
    @parent
@endsection

@section('navbar')
    @parent
@endsection

@section('body')
<!--
<div class="row">
    <div class="pricing-header px-3 py-3 pt-md-2 pb-md-2 mx-auto text-center">
        <h2 class="display-4">Coches</h1>
    </div>
</div>
-->
<div class="row pt-3">
    <div class="col-sm pt-2">
        <!--Card-->
        <div class="card">
            <!--Card image-->
            <div class="view overlay hm-white-slight">
                <img src="{!! asset('images/admin/entity/patent/marcas-de-coche2.jpg') !!}" class="img-fluid" alt="">
                <a href="{{ route('coches.index') }}">
                    <div class="mask"></div>
                </a>
            </div>
            <!--Card content-->
            <div class="card-body">
                <!--Title-->
                <h4 class="card-title">Marcas</h4>
                <!--Text-->
                <p class="card-text">Añade, modifica y elimina marcas con las que trabajar.</p>
                <a href="#" class="btn btn-danger">Ver</a>
            </div>
        </div>
        <!--/.Card-->
    </div>
    <div class="col-sm pt-2">
        <!--Card-->
        <div class="card">
            <!--Card image-->
            <div class="view overlay hm-white-slight">
                <img src="{!! asset('images/admin/entity/patent/modelos-de-coche2.jpg') !!}" class="img-fluid" alt="">
                <a href="#">
                    <div class="mask"></div>
                </a>
            </div>
            <!--Card content-->
            <div class="card-body">
                <!--Title-->
                <h4 class="card-title">Modelos</h4>
                <!--Text-->
                <p class="card-text">Añade, modifica y elimina modelos con los que trabajar.</p>
                <a href="#" class="btn btn-danger">Ver</a>
            </div>
        </div>
        <!--/.Card-->
    </div>
    <div class="col-sm pt-2">
        <!--Card-->
        <div class="card">
            <!--Card image-->
            <div class="view overlay hm-white-slight">
                <img src="{!! asset('images/admin/entity/car/content/bmw-principal2.jpg') !!}" class="img-fluid" alt="">
                <a href="{{ route('coches.index') }}">
                    <div class="mask"></div>
                </a>
            </div>
            <!--Card content-->
            <div class="card-body">
                <!--Title-->
                <h4 class="card-title">Coches</h4>
                <!--Text-->
                <p class="card-text">Añade, modifica y elimina coches con las que trabajar.</p>
                <a href="{{ route('coches.index') }}" class="btn btn-danger">Ver</a>
            </div>
        </div>
        <!--/.Card-->
    </div>
</div>
<div class="row pt-3">
    <div class="pricing-header px-3 py-3 mx-auto text-center">
        <h1 class="jumbotron-heading">Más configuraciones
            <i class="fas fa-arrow-circle-down text-danger" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></i>
        </h1>
    </div>
</div>

<div class="row pt-3 pb-3 mb-3" id="collapseExample">
    <div class="col-sm pt-2">
        <!--Card-->
        <div class="card">
            <a href="#">
                <!--Card content-->
                <div class="card-body waves-effect text-center bg-primary">
                    <!--Title-->
                    <h4 class="card-title text-center text-white">Combustible</h4>
                    <!--Text-->
                    <i class="fas fa-plug fa-5x text-white" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <!--/.Card-->
    </div>
    <div class="col-sm pt-2">
        <!--Card-->
        <div class="card">
            <a href="#">
                <!--Card content-->
                <div class="card-body waves-effect text-center bg-primary">
                    <!--Title-->
                    <h4 class="card-title text-center text-white">Cambio</h4>
                    <!--Text-->
                    <i class="fas fa-cogs fa-5x text-white" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <!--/.Card-->
    </div>
    <div class="col-sm pt-2">
        <!--Card-->
        <div class="card">
            <a href="#">
                <!--Card content-->
                <div class="card-body waves-effect text-center bg-primary">
                    <!--Title-->
                    <h4 class="card-title text-center text-white">Norm. Emisión</h4>
                    <!--Text-->
                    <i class="fas fa-tree fa-5x text-white" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <!--/.Card-->
    </div>
</div>
@endsection

@section('javascript')
    @parent
@endsection