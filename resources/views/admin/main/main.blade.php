@extends('admin.layout.master')

@section('title', 'Gocoche')

@section('style')
    @parent
@endsection

@section('navbar')
    @parent
@endsection

@section('body')
<div class="row pt-3">
    <div class="col-sm">
        <!--Card-->
        <div class="card">
            <a href="{{ route('admin.coches.index') }}">
                <!--Card content-->
                <div class="card-body waves-effect text-center bg-orange">
                    <!--Title-->
                    <h4 class="card-title text-center text-white">Coches</h4>
                    <!--Text-->
                    <i class="fa fa-car fa-5x text-white" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <!--/.Card-->
    </div>
    <div class="col-sm">
        <!--Card-->
        <div class="card">
            <!--Card content-->
            <div class="card-body waves-effect text-center bg-success">
                <!--Title-->
                <h4 class="card-title text-center text-white">Usuarios</h4>
                <!--Text-->
                <i class="fa fa-users fa-5x text-white" aria-hidden="true"></i>
            </div>

        </div>
        <!--/.Card-->
    </div>       
</div>
<!--
<div class="row pt-3">
    <div class="col">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col">
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody class="table-info">
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Login:</h3>
                <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="text" id="defaultForm-email" class="form-control">
                    <label for="defaultForm-email">Your email</label>
                </div>
                <div class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control">
                    <label for="defaultForm-pass">Your password</label>
                </div>
                <div class="text-center">
                    <button class="btn btn-default waves-effect waves-light">next</button>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection

@section('footer')
    @parent
@endsection

@section('javascript')
    @parent
@endsection