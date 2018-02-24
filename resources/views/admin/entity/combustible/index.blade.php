@extends('admin.layout.master')

@section('title', 'Gocoche')

@section('style')
    @parent
@endsection

@section('navbar')
    @parent
@endsection

@section('body')

@include('admin.modules.addEntityButton')
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
<div class="row">
    <div class="pricing-header px-3 py-3 mx-auto text-center">
        <h1 class="jumbotron-heading">
            Combustibles
        </h1>
    </div>
</div>
<div class="row pt-2">
    <div class="col">
        @include('admin.modules.table.basicTable')
    </div>
</div>

@endsection

@section('javascript')
    @parent
@endsection