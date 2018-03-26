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
                            <div class="md-form">
                                <i class="fas fa-lock-open prefix light-blue-text"></i>
                                <input type="number" name="doors" min="0" max="10" step="1" id="itemDoors" class="form-control" required
                                       value="{{ $item->doors }}">
                                <label for="itemDoors">Núm. puertas</label>
                                <div class="invalid-feedback">
                                    @lang('form.empty_required')
                                </div>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-street-view prefix light-blue-text"></i>
                                <input type="number" name="places" min="0" max="30" step="1" id="itemPlaces" class="form-control" required
                                       value="{{ $item->places }}">
                                <label for="itemPlaces">Núm. Plazas</label>
                                <div class="invalid-feedback">
                                    @lang('form.empty_required')
                                </div>
                            </div>
                            <div class="form-group light-blue-text">
                                <label for="selectId">Marca</label>
                                <select id="selectId" class="form-control" name="{{ class_basename(\App\Patent::class) }}" required>
                                    @foreach ($patentsList as $patentList)
                                        <option value="{{ $patentList->id }}"
                                        @if($item->patent && $patentList->id == $item->patent->id) {{ "selected" }} @endif> {{ $patentList->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group light-blue-text">
                                <label for="selectId">Tipo de vehículo</label>
                                <select id="selectId" class="form-control" name="{{ class_basename(\App\VehicleType::class) }}" required>
                                    @foreach ($vehicleTypeList as $vehicleType)
                                        <option value="{{ $vehicleType->id }}"
                                        @if($item->vehicleType && $vehicleType->id == $item->vehicleType->id) {{ "selected" }} @endif> {{ $vehicleType->name }}
                                        </option>
                                    @endforeach
                                </select>
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



