@extends('admin.layout.master')

@section('title', 'Gocoche')

@section('style')
    @parent
@endsection

@section('navbar')
    @parent
@endsection

@section('body')
    @include('admin.modules.goToIndexButton')
    <div class="row">
        <div class="pricing-header px-3 py-3 mx-auto text-center">
            <h1 class="jumbotron-heading">
                Añadir {{ str_replace('-', ' ', $routeName) }}
            </h1>
        </div>
    </div>
    <div class="row pt-2 mb-4">
        <div class="col-sm-6 mx-auto">
            @include('admin.modules.form.basicForm')
        </div>
    </div>
@endsection

@section('javascript')
    @parent
@endsection