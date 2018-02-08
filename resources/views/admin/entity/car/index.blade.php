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
    <div class="col">
        <table class="table table-hover table-light text-center">
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
                        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
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