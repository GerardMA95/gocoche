@foreach ($itemArray as $item)
    <div class="row bg-white p-1 m-3 rounded border">
        <div class="col-sm-6 col-md-3 text-center my-auto">
            @if ($item->image_url)
                <img class="logo-image" src="{{ url($item->image_url) }}"
                     alt="{{ $item->name }}"/>
            @else
                <img class="logo-image" style="width: 128px; height: 128px;" class="rounded-circle"
                     src="{{ asset('images/notFound.jpg') }}" alt="Sim imagen"/>
            @endif
        </div>
        <div class="col-sm-6 col-md-7">
            <div class="text-center">
                <h2>{{ $item->name }}</h2>
            </div>
            <p>{{ $item->description }}</p>
        </div>
        <div class="col my-auto p-2">
            <a class="mb-2" href="{{ route( $routeName.'.edit', ['id' => $item->id]) }}">
                <button type="button" class="btn btn-primary btn-block">
                    <i class="fas fa-edit"></i>
                </button>
            </a>
            <form action="{{ route( $routeName.'.destroy', ['id' => $item->id]) }}" method="POST">
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger btn-block" type="submit">
                    <i class="fas fa-ban"></i>
                </button>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endforeach


