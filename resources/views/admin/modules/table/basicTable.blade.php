<table class="table table-hover table-light text-center table-responsive w-100 d-block d-md-table">
    <thead class="thead-dark">
        <tr>
            <th  style="background: #d95459;">ID</th>
            <th  style="background: #d95459;">Nombre</th>
            <th  style="background: #d95459;">Descripción</th>
            <th  style="background: #d95459;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($itemArray as $item)
            <tr>
                <th scope="row"> {{ $item->id }} </th>
                <td> {{ $item->name }} </td>
                <td> {{ $item->description }} </td>
                <td>
                    <div class="row text-center">
                        <div class="col-sm-6">
                            <a href="{{ route( $routeName.'.edit', ['id' => $item->id]) }}">
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route( $routeName.'.destroy', ['id' => $item->id]) }}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-ban"></i>
                                </button>
                                {!! csrf_field() !!}
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>