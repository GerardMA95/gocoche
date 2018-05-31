@extends('admin.layout.master')

@section('title', 'Quality Luxe Cars - Admin')

@section('style')
    @parent
    <link href="https://fonts.googleapis.com/css?family=Mukta+Malar" rel="stylesheet">
    <style type="text/css">
        .row-section{  /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #fff, #f3f3f4, #d95459);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #fff, #f3f3f4, #d95459); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>
@endsection

@section('navbar')
    @parent
@endsection

@section('body')

    @include('admin.modules.addEntityButton')
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

    @if($itemArray->isEmpty())
        <div class="row">
            <div class="pricing-header px-3 py-3 mx-auto text-center">
                <h1 class="jumbotron-heading">
                    {{ trans('admin.no_data_yet') }}
                </h1>
            </div>
        </div>
    @else
        <div class="row">
            <div class="pricing-header px-3 py-3 mx-auto text-center">
                <h1 class="jumbotron-heading">
                    Marcas
                </h1>
            </div>
        </div>
        <div class="row-section p-2 mb-5">
            @include('admin.modules.list.basicListImage')
        </div>
    @endif

@endsection

@section('javascript')
    @parent
@endsection