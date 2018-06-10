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
                Añadir {{ str_replace('-', ' ', $routeName) }}
            </h1>
        </div>
    </div>
    @if ($errors->any())
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="row pt-2 mb-4">
        @include('admin.modules.form.vehicle.vehicleBaseForm')
    </div>
@endsection
@section('javascript')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $("#itemDescription").editor();
        });
        $('#itemEnrollmentDate').datepicker();

        $('#patentList').on('change', function () {
            patentId = this.value;
            reloadPattern(patentId);
        });

        function reloadPattern(patentId) {
            $.ajax({
                type: "POST",
                url: "{{ route('modelo.reloadPatternList') }}",
                data: {
                    patentId: patentId
                },
                dataType: "json",
            })
                .done(function (data) {
                    patternList = data.patternList;

                    var patternSelect = $("#patternList");
                    patternSelect.empty(); // remove old options
                    $.each(patternList, function(postion, pattern) {
                        patternSelect.append($("<option></option>")
                            .attr("value", pattern.id).text(pattern.name));
                    });
                })
                .fail(function (data) {
                    alert(data['message']);
                });
        }
    </script>
@endsection