@extends('admin.layout.authentication')

@section('title', 'Gocoche')

@section('style')
    @parent
    <style type="text/css">
    /*
        .bg-image-login-form {
            background-image: url({!! asset('images/admin/main/authentication-bg4.jpg') !!});
            background-size: 100% 100%;
        }
        */
    </style>
@endsection

@section('navbar')
    
@endsection

@section('body')
<div class="row pt-3">
    <div class="col-sm-6 mx-auto bg-white rounded border">
        <!-- Form login -->
        <form method="POST" action="{{ route('admin.login') }}" class="text-info">
            <h1 class="text-center">Iniciar sesión</h1>
            <div class="md-form">
                <i class="fa fa-envelope prefix"></i>
                <input type="text" id="defaultForm-email" name="email" class="form-control">
                <label for="defaultForm-email">Correo electrónico</label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="defaultForm-pass" name="password" class="form-control">
                <label for="defaultForm-pass">Contraseña</label>
            </div>

            <div class="text-center">
                <button class="btn btn-default" type="submit">Entrar</button>
            </div>
            {!! csrf_field() !!}
        </form>
        <!-- Form login -->
    </div>
</div>
<div class="row pt-3">
    <div class="col-sm-6 mx-auto">
        <div class="alert alert-primary" role="alert">
            Haz click <a href="{{ route('main') }}" class="alert-link">AQUÍ</a> para volver a la página principal.
        </div>
    </div>
</div>
@endsection

@section('javascript')
    @parent
@endsection