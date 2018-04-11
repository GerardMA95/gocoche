@if (!empty($routeAction))
    @if ($routeAction == 'update')
        <form action="{{ route( $routeName.'.'.$routeAction, ['id' => $item->id]) }}" method="POST" novalidate
              class="needs-validation col-12">
    @else
        <form action="{{ route( $routeName.'.'.$routeAction) }}" method="POST" novalidate
              class="needs-validation col-12">
    @endif
        @if (!empty($formMethod))
            <input name="_method" type="hidden" value="{{ $formMethod }}">
        @endif
            <div class="row">
                <div class="col-12 col-lg-6 mx-auto mb-3">
                    @include('admin.modules.form.vehicle.vehicleRelationsInputs')
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 mx-auto mb-3">
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <label for="combustible_id">
                                        Combustible
                                        <i class="fas fa-plug" aria-hidden="true"></i>
                                    </label>
                                    <select id="combustible_id" class="form-control" name="{{ class_basename(\App\Combustible::class) }}" required>
                                        @foreach ($combustibleList as $combustible)
                                            <option value="{{ $combustible->id }}" @if($item->patent && $combustible->id == $item->combustible->id) {{ "selected" }} @endif>
                                                {{ $combustible->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <label for="gearshift_id">
                                        Cambio
                                        <i class="fas fa-cogs" aria-hidden="true"></i>
                                    </label>
                                    <select id="gearshift_id" class="form-control" name="{{ class_basename(\App\Gearshift::class) }}" required>
                                        @foreach ($gearshiftList as $gearshift)
                                            <option value="{{ $gearshift->id }}" @if($item->patent && $gearshift->id == $item->$gearshift->id) {{ "selected" }} @endif>
                                                {{ $gearshift->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <label for="emission_regulation_id">
                                        Normativa de emisión
                                        <i class="fas fa-tree" aria-hidden="true"></i>
                                    </label>
                                    <select id="emission_regulation_id" class="form-control" name="{{ class_basename(\App\EmissionRegulation::class) }}" required>
                                        @foreach ($emissionRegulationList as $emissionRegulation)
                                            <option value="{{ $emissionRegulation->id }}" @if($item->patent && $emissionRegulation->id == $item->emissionRegulation->id) {{ "selected" }} @endif>
                                                {{ $emissionRegulation->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <label for="vehicle_type_id">
                                        Tipo de vehículo
                                        <i class="fas fa-bus" aria-hidden="true"></i>
                                    </label>
                                    <select id="vehicle_type" class="form-control" name="{{ class_basename(\App\VehicleType::class) }}" required>
                                        @foreach ($vehicleTypeList as $vehicleType)
                                            <option value="{{ $vehicleType->id }}" @if($item->patent && $vehicleType->id == $item->vehicleType->id) {{ "selected" }} @endif>
                                                {{ $vehicleType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <label for="traction_id">
                                        Tracción
                                        <i class="fas fa-bolt" aria-hidden="true"></i>
                                    </label>
                                    <select id="traction_id" class="form-control" name="{{ class_basename(\App\Traction::class) }}" required>
                                        @foreach ($tractionList as $traction)
                                            <option value="{{ $traction->id }}" @if($item->patent && $traction->id == $item->patent->id) {{ "selected" }} @endif>
                                                {{ $traction->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mx-auto mb-3">
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12 col-lg-4 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="fas fa-id-card prefix light-blue-text"></i>
                                        <input type="text" name="id" disabled id="itemId" class="form-control"
                                               value="{{ $item->id }}">
                                        <label for="itemId">ID</label>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-8 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="far fa-file-alt prefix light-blue-text"></i>
                                        <input type="text" name="name" id="itemName" class="form-control" required
                                               value="{{ $item->name }}">
                                        <label for="itemName">Nombre</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="fas fa-lock-open prefix light-blue-text"></i>
                                        <input type="number" name="km" min="0" max="400000" step="1000" id="itemKm" class="form-control" required
                                               value="{{ $item->km }}">
                                        <label for="itemKm">Núm. de kilometros</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="far fa-file-alt prefix light-blue-text"></i>
                                        <input type="text" name="color" id="itemColor" class="form-control" required
                                               value="{{ $item->color }}">
                                        <label for="itemColor">Color</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="fas fa-lock-open prefix light-blue-text"></i>
                                        <input type="text" name="registration" id="itemRegistration" class="form-control" required
                                               value="{{ $item->registration }}">
                                        <label for="itemRegistration">Fecha de matriculación</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="far fa-file-alt prefix light-blue-text"></i>
                                        <input type="text" name="color" id="itemColor" class="form-control" required
                                               value="{{ $item->color }}">
                                        <label for="itemColor">Color</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="fas fa-lock-open prefix light-blue-text"></i>
                                        <input type="number" name="price" min="0" max="400000" step="100" id="itemPrice" class="form-control" required
                                               value="{{ $item->price }}">
                                        <label for="itemPrice">Precio</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Description -->
                <div class="col-12">
                    <div class="card border-light mb-3">
                        <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                        <div class="card-body">
                            <p class="card-text">
                                <!-- Default textarea message -->
                                <label for="itemDescription" class="light-blue-text">Descripción</label>
                                <textarea type="text" name="description" id="itemDescription" class="form-control" required
                                          rows="3">{{ $item->description }}</textarea>
                                <div class="invalid-feedback">
                                    @lang('form.empty_required')
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="" data-toggle="modal" data-target="#productModal">
                                <img class="img-fluid" src="https://dummyimage.com/400x400/55595c/fff">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Add to cart -->
                <div class="col-12 col-lg-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group files">
                                <label> Imágenes </label>
                                <input type="file" class="form-control" multiple="">
                            </div>
                        </div>
                    </div>
                </div>
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



