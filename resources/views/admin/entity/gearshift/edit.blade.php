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
    @if(session()->has('alertArray'))
        <div class="row pt-3">
            <div class="col-sm-12">
                @foreach (session()->get('alertArray') as $alert)
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
        <div class="pricing-header px-3 py-3 mx-auto text-center">
            <h1 class="jumbotron-heading">
                Editar {{ $item->name }}
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