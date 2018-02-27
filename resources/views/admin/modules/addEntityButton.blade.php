<div class="row pt-3">
    <div class="col">
        <a href="{{ route($routeName.'.create') }}">
            <button type="button" class="btn btn-outline-success waves-effect bg-white">Añadir {{ str_replace('-', ' ', $routeName) }}
                <i class="fas fa-plus-circle" aria-hidden="true"></i>
            </button>
        </a>
    </div>
</div>