@extends('admin.layout.master')

@section('title', 'Carocasion - Admin')

@section('style')
    @parent
@endsection

@section('navbar')
    @parent
@endsection

@section('body')

<div class="row pt-3">
    <div class="col">
        <a href="{{ route('coches.create') }}">
            <button type="button" class="btn btn-outline-success waves-effect">Añadir vehículo 
                <i class="fas fa-plus-circle" aria-hidden="true"></i>
            </button>
        </a>
    </div>
</div>
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
                <a class="nav-link active hvr-bounce-to-right" href="#">
                    <i class="fas fa-check"></i>
                     Todos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link hvr-bounce-to-right" href="#">
                    <i class="fas fa-eye"></i>
                    Visibles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link hvr-bounce-to-right" href="#">
                    <i class="far fa-eye-slash"></i> 
                    No visibles
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="row pt-2">
    <div class="col">
        <table class="table table-hover table-light text-center table-responsive w-100 d-block d-md-table">
            <thead class="thead-dark">
                <tr>
                    <th  style="background: #d95459;">ID</th>
                    <th  style="background: #d95459;">Marca</th>
                    <th  style="background: #d95459;">Modelo</th>
                    <th  style="background: #d95459;">Matrícula</th>
                    <th  style="background: #d95459;">Precio</th>
                    <th  style="background: #d95459;">Color</th>
                    <th  style="background: #d95459;">Km.</th>
                    <th  style="background: #d95459;">Visible</th>
                    <th  style="background: #d95459;">Fecha de entrada</th>
                    <th  style="background: #d95459;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Ford</td>
                    <td>Focus</td>
                    <td>2384TFG</td>
                    <td>5000€</td>
                    <td>Azul</td>
                    <td>140.000</td>
                    <td>
                        <span class="badge badge-pill green">Visible</span>
                    </td>
                    <td> 21/01/2018 </td>
                    <td>
                        <a href="{{ route('coches.show', ['carId' => '1']) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Ford</td>
                    <td>Focus</td>
                    <td>2384TFG</td>
                    <td>5000€</td>
                    <td>Azul</td>
                    <td>140.000</td>
                    <td>
                        <span class="badge badge-pill badge-danger">No visible</span>
                    </td>
                    <td> 21/01/2018 </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">12</th>
                    <td>Ford</td>
                    <td>Focus</td>
                    <td>2384TFG</td>
                    <td>5000€</td>
                    <td>Azul</td>
                    <td>140.000</td>
                    <td>
                        <span class="badge badge-pill green">Visible</span>
                    </td>
                    <td> 21/01/2018 </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">23</th>
                    <td>Ford</td>
                    <td>Focus</td>
                    <td>2384TFG</td>
                    <td>5000€</td>
                    <td>Azul</td>
                    <td>140.000</td>
                    <td>
                        <span class="badge badge-pill green">Visible</span>
                    </td>
                    <td> 21/01/2018 </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">145</th>
                    <td>Ford</td>
                    <td>Focus</td>
                    <td>2384TFG</td>
                    <td>5000€</td>
                    <td>Azul</td>
                    <td>140.000</td>
                    <td>
                        <span class="badge badge-pill badge-danger">No visible</span>
                    </td>
                    <td> 21/01/2018 </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('javascript')
    @parent
@endsection