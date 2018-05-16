<table class="table table-hover table-light text-center table-responsive w-100 d-block d-md-table">
    <thead class="thead-dark">
        <tr>
            <th  style="background: #d95459;">ID</th>
            <th  style="background: #d95459;">Nombre</th>
            <th  style="background: #d95459;">Marca</th>
            <th  style="background: #d95459;">Modelo</th>
            <th  style="background: #d95459;">Matrícula</th>
            <th  style="background: #d95459;">Fecha de matriculación</th>
            <th  style="background: #d95459;">Precio</th>
            <th  style="background: #d95459;">Color</th>
            <th  style="background: #d95459;">Km.</th>
            <th  style="background: #d95459;">Visible</th>
            <th  style="background: #d95459;">Fecha de entrada</th>
            <th  style="background: #d95459;">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($itemArray as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->patent->name }}</td>
            <td>{{ $item->pattern->name }}</td>
            <td>{{ $item->enrollment }}2384TFG</td>
            <td> {{ date('d/m/Y', strtotime($item->enrollment_date)) }} </td>
            <td>{{ $item->price }} € </td>
            <td>{{ $item->color }}</td>
            <td>{{ $item->km }}</td>
            <td>
                @if($item->active)
                    <span class="badge badge-pill green">Visible</span>
                @else
                    <span class="badge badge-pill badge-danger">No visible</span>
                @endif

            </td>
            <td> {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }} </td>
            <td>
                <a href="{{ route( $routeName.'.edit', ['id' => $item->id]) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                <form action="{{ route( $routeName.'.destroy', ['id' => $item->id]) }}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-ban"></i>
                    </button>
                    {!! csrf_field() !!}
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>