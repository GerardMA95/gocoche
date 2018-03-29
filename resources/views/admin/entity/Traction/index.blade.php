@extends('admin.layout.master')

@section('title', 'Carocasion - Admin')

@section('style')
    @parent
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
                    Tracción
                </h1>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col">
                @include('admin.modules.table.basicTable')
            </div>
        </div>
    @endif


@endsection

@section('javascript')
    @parent
@endsection