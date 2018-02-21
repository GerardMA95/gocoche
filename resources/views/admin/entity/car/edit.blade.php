@extends('admin.layout.master')

@section('title', 'Gocoche')

@section('style')
    @parent
@endsection

@section('navbar')
    @parent
@endsection

@section('body')
<div class="row pt-3">
    <div class="pricing-header px-3 py-3 mx-auto text-center">
        <h1 class="jumbotron-heading">
            Editar coche
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-sm">
        <!--Card-->
        <div class="card" style="
            border-width: 0px;
            -webkit-box-shadow: 0px 0px;
            box-shadow: 0px 0px;
            background-color: rgba(0,0,0,0.0);
            background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop( 0% , rgba(0,0,0,0.00)),color-stop( 100% , rgba(0,0,0,0.00)));
            background-image: -webkit-linear-gradient(270deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
            background-image: linear-gradient(180deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
        ">
            <!--Card image-->
            <div class="view overlay hm-white-slight" style="
                border-radius: 4px;
            ">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%287%29.jpg" class="img-fluid" alt="">
                <a href="#">
                    <div class="mask waves-effect waves-light"></div>
                </a>
            </div>
            <!--Card content-->
            <div class="card-body" style="
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                background: white;
                margin-left: 4%;
                border-radius: 0.25rem;
                margin-right: 4%;
            ">
                <!--title-->
                <h4 class="card-title">Card title</h4>
                <!--Text-->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
            </div>
        </div>
        <!--/.Card-->
    </div>
    <div class="col-sm">
        <!--Card-->
        <div class="card" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%287%29.jpg);">
            <!--Card content-->
            <div class="card-body waves-effect">
                <!--Title-->
                <h4 class="card-title text-center text-white">Card title</h4>
                <!--Text-->
                <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
            </div>
        </div>
        <!--/.Card-->
    </div>
    <div class="col-sm">
        <!--Card-->
        <div class="card">
            <!--Card image-->
            <div class="view overlay hm-white-slight">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%287%29.jpg" class="img-fluid" alt="">
                <a href="#">
                    <div class="mask"></div>
                </a>
            </div>
            <!--Card content-->
            <div class="card-body">
                <!--Title-->
                <h4 class="card-title">Card title</h4>
                <!--Text-->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Button</a>
            </div>
        </div>
        <!--/.Card-->
    </div>
</div>


<div class="row pt-3">
    <div class="pricing-header px-3 py-3 mx-auto text-center">
        <h1 class="jumbotron-heading">
            Añadir coche
        </h1>
    </div>
</div>
<div class="row pt-1">
    <div class="col-lg-3 mx-auto">
        <!--Card-->
        <div class="card">
            <a href="{{ route('admin.coches.index') }}">
                <!--Card content-->
                <div class="card-body waves-effect text-center bg-success">
                    <!--Title-->
                    <h4 class="card-title text-center text-white">Coches</h4>
                    <!--Text-->
                    
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