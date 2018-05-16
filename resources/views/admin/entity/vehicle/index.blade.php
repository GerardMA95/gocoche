@extends('admin.layout.master')

@section('title', 'Carocasion - Admin')

@section('style')
    @parent
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
    <div class="row pt-3">
        <div class="pricing-header px-3 py-3 mx-auto text-center">
            <h1 class="jumbotron-heading">
                Lista de coches
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link @if(!isset($visible)) active @endif  hvr-bounce-to-right" href="{{ route('vehiculo.index') }}">
                        <i class="fas fa-check"></i>
                        Todos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(isset($visible) && $visible) active @endif hvr-bounce-to-right" href="{{ route('vehiculo.active') }}">
                        <i class="fas fa-eye"></i>
                        Visibles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(isset($visible) && !$visible) active @endif hvr-bounce-to-right" href="{{ route('vehiculo.disabled') }}">
                        <i class="far fa-eye-slash"></i>
                        No visibles
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @if($itemArray->isEmpty())
        <div class="row">
            <div class="pricing-header px-3 py-3 mx-auto text-center">
                <h1 class="jumbotron-heading">
                    {{ trans('admin.no_data_yet') }}
                </h1>
            </div>
        </div>
    @else
        <div class="row-section pt-2 pb-2">
            <div class="col">
                @include('admin.modules.table.vehicleTable')
            </div>
        </div>
    @endif
@endsection

@section('javascript')
    @parent
@endsection