@extends('admin.layout.master')

@section('title', 'Gocoche')

@section('style')
    @parent
    <style type="text/css">
        .social-buttons ul {
            position: absolute;
            margin: 0;
            padding: 0;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
        }

        .social-buttons ul li {
            list-style: none;
        }

        .social-buttons ul li a {
            position: relative;
            display: block;
            width: 60px;
            height: 60px;
            font-size: 20px;
            text-align: center;
            line-height: 60px;
            color: #262626;
            overflow: hidden;

            margin: 15px;
            transform: rotate(45deg);
            transition: .2s;
            border: 1px solid rgba(0, 0, 0, 1);
        }

        .social-buttons ul li a svg {
            transform: rotate(-45deg);
        }

        .social-buttons ul li a:before {
            content: '';
            position: absolute;
            bottom: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: #262626;
            transition: .2s;
        }

        .social-buttons ul li a:hover:before {
            bottom: 0;
        }

        .social-buttons ul li a:hover {
            color: #fff;
        }

        .social-buttons ul li:nth-child(1) a:before {
            background: #3b5998;
        }

        .social-buttons ul li:nth-child(2) a:before {
            background: #00aced;
        }

        .social-buttons ul li:nth-child(3) a:before {
            background: #dd4b39;
        }

        .social-buttons ul li:nth-child(4) a:before {
            background: #007bb6;
        }

        .social-buttons  ul li:nth-child(5) a:before {
            background: #bc2a8d;
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
                    Combustibles
                </h1>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col">
                @include('admin.modules.table.basicTable')
            </div>
        </div>
    @endif
    <div class="row pt-5">
        <div class="col social-buttons">
            <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>

@endsection

@section('javascript')
    @parent
@endsection