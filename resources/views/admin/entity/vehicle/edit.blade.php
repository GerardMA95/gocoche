@extends('admin.layout.master')

@section('title', 'Quality Luxe Cars - Admin')

@section('style')
    @parent
    <style type="text/css">
        /* PARA LOS INPUT FILE */
        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }

        .files input:focus {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            border: 1px solid #92b0b3;
        }

        .files {
            position: relative
        }

        .files:after {
            pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        .color input {
            background-color: #f1f1f1;
        }

        .files:before {
            position: absolute;
            bottom: 10px;
            left: 0;
            pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: " O arrastra aqui ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }
    </style>
@endsection

@section('navbar')
    @parent
@endsection

@section('body')
    @include('admin.modules.goToIndexButton')
    <div class="row">
        <div class="pricing-header px-3 py-3 mx-auto text-center">
            <h1 class="jumbotron-heading">
                Editar {{ str_replace('-', ' ', $routeName) }}
            </h1>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                @if($item->active)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{trans('form.vehicle_visible')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @if($item->highlighted)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{trans('form.vehicle_highlighted')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{trans('form.vehicle_no_visible')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(empty($itemImagesList))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{trans('form.vehicle_no_images')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>

    @include('admin.modules.showRequestErrors')
    <div class="row pt-2 mb-4">
        @include('admin.modules.form.vehicle.vehicleBaseForm')
    </div>
    @forelse($itemImagesList as $index => $itemImageUrl)
        <!-- Modal image -->
        <div class="modal fade" id="image-modal-{{ $index }}" tabindex="-1" role="dialog"
             aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">{{ $item->name }} - {{ $index }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body mx-auto">
                        <img class="img-fluid" src="{{ url($itemImageUrl) }}"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        {{-- If empty --}}
    @endforelse

@endsection
@section('javascript')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $("#itemDescription").editor();
        });
        $('#itemEnrollmentDate').datepicker();

        function updateActiveVehicle(vehicleId, active) {
            $.ajax({
                type: "POST",
                url: "{{ route('vehiculo.ajaxUpdateActive') }}",
                data: {
                    vehicleId: vehicleId,
                    active: active
                },
                dataType: "json",
            })
            .done(function (data) {
                location.reload();
            })
            .fail(function (data) {
                alert(data['message']);
            })
        }

        function updateHighlightVehicle(vehicleId, highlight) {
            var jqxhr = $.ajax({
                url: '{{ route('vehiculo.ajaxUpdateHighlight') }}',
                method: 'POST',
                dataType: 'json',
                data: {vehicleId: vehicleId, highlight: highlight},
            })
                .done(function () {
                    alert("success");
                })
                .fail(function () {
                    alert("error");
                })
                .always(function () {
                    alert("complete");
                });
            console.log(jqxhr);
        }
    </script>
@endsection