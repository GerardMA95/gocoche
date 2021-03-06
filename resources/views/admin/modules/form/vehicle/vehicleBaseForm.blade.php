@if (!empty($routeAction))
    @if ($routeAction == 'update')
        <form action="{{ route( $routeName.'.'.$routeAction, ['id' => $item->id]) }}" method="POST" novalidate enctype="multipart/form-data"
              class="needs-validation col-12">
    @else
        <form action="{{ route( $routeName.'.'.$routeAction) }}" method="POST" novalidate enctype="multipart/form-data"
              class="needs-validation col-12">
    @endif
        @if (!empty($formMethod))
            <input name="_method" type="hidden" value="{{ $formMethod }}">
        @endif
            @if ($routeAction == 'update')
            <div class="row">
                <div class="col-12 col-lg-6 mx-auto mb-3">
                    @include('admin.modules.form.vehicle.vehicleProfitInput')
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-12 col-lg-6 mx-auto mb-3">
                    @if ($item->id)
                        <div class="row">
                            <div class="col-12 col-lg-6  mb-2">
                                @if ($item->active)
                                    <button type="button" onclick="updateActiveVehicle('{{ $item->id }}', 0)" class="btn btn-danger btn-lg btn-block">Desactivar <i class="fas fa-times-circle"></i></button>
                                @else
                                    <button type="button" onclick="updateActiveVehicle('{{ $item->id }}', 1)" class="btn btn-success btn-lg btn-block">Activar <i class="fas fa-check-circle"></i></button>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                @if ($item->highlighted)
                                    <button onclick="updateHighlightVehicle('{{ $item->id }}', 0)" type="button" class="btn btn-danger btn-lg btn-block">Quitar destacado <i class="far fa-star"></i></i></button>
                                @else
                                    <button onclick="updateHighlightVehicle('{{ $item->id }}', 1)" type="button" class="btn btn-warning btn-lg btn-block">Destacar <i class="fas fa-star"></i></button>
                                @endif

                            </div>
                        </div>
                    @endif
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
                            </div>
                            <div class="row">
                                <div class="form-group col-12 light-blue-text mx-auto">
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
                                        <i class="fas fa-globe prefix light-blue-text"></i>
                                        <input type="text" name="enrollment" id="itemEnrollment" class="form-control"
                                               value="{{ $item->enrollment }}">
                                        <label for="itemEnrollment">Matrícula</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div>
                                        <input style="margin-top: 1rem;" type="text" name="enrollment_date" id="itemEnrollmentDate" class="form-control" placeholder="Fecha de matriculación"
                                               value="@if($item->enrollment_date) {{ date('d/m/Y', strtotime($item->enrollment_date)) }} @endif">
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="fas fa-tachometer-alt prefix light-blue-text"></i>
                                        <input type="number" name="km" id="itemKm" class="form-control" required
                                               value="{{ $item->km }}">
                                        <label for="itemKm">Núm. de kilometros</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="fas fa-fire prefix light-blue-text"></i>
                                        <input type="number" name="power" id="power" class="form-control" required
                                               value="{{ $item->power }}">
                                        <label for="power">Potencia (CV)</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="fas fa-euro-sign prefix light-blue-text"></i>
                                        <input type="number" name="price_bought" id="price_bought" class="form-control" required
                                               value="{{ $item->price_bought }}">
                                        <label for="price_bought">Precio de compra</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                                    <div class="md-form">
                                        <i class="fas fa-euro-sign prefix light-blue-text"></i>
                                        <input type="number" name="price" id="price" class="form-control" required
                                               value="{{ $item->price }}">
                                        <label for="price">Precio de venta</label>
                                        <div class="invalid-feedback">
                                            @lang('form.empty_required')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mx-auto mb-3">
                    @include('admin.modules.form.vehicle.vehicleRelationsInputs')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card border-light mb-3">
                        <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i>
                            Descripción corta
                            <a data-toggle="tooltip"  data-placement="top" title="Esta descripción será la primera que se verá del vehículo, también es importante utilizar palabras clave para posicionar mejor.">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <!-- Default textarea message -->
                                <label for="itemShortescription" class="light-blue-text">Descripción corta</label>
                                <textarea style="min-height: 100px;" type="text" name="short_description" id="itemShortescription" class="form-control" required
                                          rows="3">{{ $item->short_description }}</textarea>
                            <div class="invalid-feedback">
                                @lang('form.empty_required')
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Description -->
                <div class="col-12">
                    <div class="card border-light mb-3">
                        <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i>
                            Descripción
                            <a data-toggle="tooltip"  data-placement="top" title="Descripción mucho más elaborada, cuanto más único sea el texto mejor posicionamento tendrá.">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <!-- Default textarea message -->
                                <label for="itemDescription" class="light-blue-text">Descripción</label>
                                <textarea style="min-height: 100px;" type="text" name="description" id="itemDescription" class="form-control" required
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
                <!-- Add to cart -->
                <div class="col-md-6 col-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group files text-center">
                                <label class="light-blue-text"> Imágen de portada </label>
                                <input type="file" name="entity-main-image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                @if($item->main_image)
                    <div class="col-md-2 col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                    <a href="" data-toggle="modal" data-target="#image-modal-main">
                                        <img class="img-fluid" src="{{ url($item->main_image) }}" style="width: 200px; height: 200px;">
                                    </a>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Add to cart -->
                <div class="col-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group files text-center">
                                <label class="light-blue-text"> Imágenes descriptivas del vehículo </label>
                                <input type="file" name="entity-images[]" class="form-control" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                @forelse($itemImagesList['images'] as $imageName => $itemImageUrl)
                    <div class="col-lg-2 col-6 remove-image">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <a href="" data-toggle="modal" data-target="#image-modal-{{ $imageName }}">
                                        <img class="img-fluid" src="{{ url($itemImageUrl) }}" style="width: 200px; height: 200px;">
                                    </a>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button  onclick="removeVehicleImage('{{ $item->id }}', '{{ $imageName }}', this)" type="button" date-image="{{ $imageName }}" class="btn btn-outline-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- If empty --}}
                @endforelse
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



