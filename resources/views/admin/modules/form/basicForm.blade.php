<!-- Card -->
<div class="card">
    <!-- Card body -->
    <div class="card-body">
        @if (!empty($routeAction))
            @if ($routeAction == 'update')
                <form action="{{ route( $routeName.'.'.$routeAction, ['id' => $item->id]) }}" method="POST" novalidate
                      class="needs-validation">
                    @else
                        <form action="{{ route( $routeName.'.'.$routeAction) }}" method="POST" novalidate
                              class="needs-validation">
                            @endif
                            @if (!empty($formMethod))
                                <input name="_method" type="hidden" value="{{ $formMethod }}">
                            @endif
                        <!-- Material input text -->
                            <div class="md-form">
                                <i class="fas fa-id-card prefix light-blue-text"></i>
                                <input type="text" name="id" disabled id="itemId" class="form-control"
                                       value="{{ $item->id }}">
                                <label for="itemId">ID</label>
                            </div>
                            <!-- Material input email -->
                            <div class="md-form">
                                <i class="far fa-file-alt prefix light-blue-text"></i>
                                <input type="text" name="name" id="itemName" class="form-control" required
                                       value="{{ $item->name }}">
                                <label for="itemName">Nombre</label>
                                <div class="invalid-feedback">
                                    @lang('form.empty_required')
                                </div>
                            </div>
                            <!-- Default textarea message -->
                            <label for="itemDescription" class="light-blue-text">Descripción</label>
                            <textarea type="text" name="description" id="itemDescription" class="form-control" required
                                      rows="3">{{ $item->description }}</textarea>
                            <div class="invalid-feedback">
                                @lang('form.empty_required')
                            </div>

                            <div class="text-center mt-4">
                                @if ($routeAction == 'update')
                                    <button class="btn btn-outline-primary" type="submit"> Editar
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @else
                                    <button class="btn btn-outline-success" type="submit"> Añadir
                                        <i class="fas fa-plus"></i>
                                    </button>
                                @endif
                            </div>
                            {!! csrf_field() !!}
                        </form>
                        @else
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                No se ha podido mostrar el formulario contactar con:
                                <strong>{{ config('mail.support_email') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
            @endif
    </div>
    <!-- Card body -->
</div>
<!-- Card -->



