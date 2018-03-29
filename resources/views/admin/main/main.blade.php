@extends('admin.layout.master')

@section('title', 'Carocasion - Admin')

@section('style')
    @parent
@endsection

@section('navbar')
    @parent
@endsection

@section('body')
<div class="row pt-3">
    <div class="col-sm m-2">
        <!--Card-->
        <div class="card">
            <a href="{{ route('admin.coches.index') }}">
                <!--Card content-->
                <div class="card-body waves-effect text-center bg-orange">
                    <!--Title-->
                    <h4 class="card-title text-center text-white">Coches</h4>
                    <!--Text-->
                    <i class="fa fa-car fa-5x text-white" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <!--/.Card-->
    </div>
    <div class="col-sm m-2">
        <!--Card-->
        <div class="card">
            <!--Card content-->
            <div class="card-body waves-effect text-center bg-success">
                <!--Title-->
                <h4 class="card-title text-center text-white">Usuarios</h4>
                <!--Text-->
                <i class="fa fa-users fa-5x text-white" aria-hidden="true"></i>
            </div>

        </div>
        <!--/.Card-->
    </div>       
</div>
@endsection

@section('footer')
    @parent
@endsection

@section('javascript')
    @parent
@endsection