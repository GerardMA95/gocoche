@extends('admin.layout.authentication')

@section('title', 'Carocasion - Admin')

@section('style')
    @parent
@endsection

@section('navbar')

@endsection

@section('body')
    @if(!empty($alertArray))
        <div class="row pt-3">
            <div class="col-sm-12">
                @foreach ($alertArray as $alert)
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            @include('admin.modules.alert.basicAlert')
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="row pt-3">
        <div class="col-sm-6 mx-auto bg-white rounded border">
            <!-- Form login -->
            <form method="POST" action="{{ route('admin.login') }}" class="needs-validation text-info" novalidate>
                <h1 class="text-center">Iniciar sesión</h1>
                <div class="md-form">

                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" id="defaultForm-email" name="email" class="form-control" required>
                    <label for="defaultForm-email">Correo electrónico</label>
                    <div class="invalid-feedback">
                        Porfavor, introduce un correo válido ( ejemplo@ejemplo.com )
                    </div>
                </div>
                <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="defaultForm-pass" name="password" class="form-control" required>
                    <label for="defaultForm-pass">Contraseña</label>
                    <div class="invalid-feedback">
                        Debes introducir una contraseña válida!
                    </div>
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
                Haz click <a href="{{ route('home') }}" class="alert-link">AQUÍ</a> para volver a la página principal.
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
@endsection