<!-- Card -->
<div class="card">
    <!-- Card body -->
    <div class="card-body">
        <div class="form-group light-blue-text">
            <label for="selectId">Marca</label>
            <select id="selectId" class="form-control" name="{{ class_basename(\App\Patent::class) }}" required>
                @foreach ($patentsList as $patent)
                    <option value="{{ $patent->id }}" @if($item->patent && $patent->id == $item->patent->id) {{ "selected" }} @endif>
                        {{ $patent->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group light-blue-text">
            <label for="selectId">Modelo</label>
            <select id="pattern" class="form-control" name="{{ class_basename(\App\Pattern::class) }}" required>
                @foreach ($patternsList as $pattern)
                    <option value="{{ $pattern->id }}" @if($item->patent && $pattern->id == $item->patent->id) {{ "selected" }} @endif>
                        {{ $pattern->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- Card body -->
</div>
<!-- Card -->
<div class="card mt-3">
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
                        <option value="{{ $combustible->id }}" @if($item->combustible && $combustible->id == $item->combustible->id) {{ "selected" }} @endif>
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
                        <option value="{{ $gearshift->id }}" @if($item->gearshift && $gearshift->id == $item->gearshift->id) {{ "selected" }} @endif>
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
                        <option value="{{ $emissionRegulation->id }}" @if($item->emissionRegulation && $emissionRegulation->id == $item->emissionRegulation->id) {{ "selected" }} @endif>
                            {{ $emissionRegulation->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                <label for="traction_id">
                    Tracción
                    <i class="fas fa-bolt" aria-hidden="true"></i>
                </label>
                <select id="traction_id" class="form-control" name="{{ class_basename(\App\Traction::class) }}" required>
                    @foreach ($tractionList as $traction)
                        <option value="{{ $traction->id }}" @if($item->traction && $traction->id == $item->traction->id) {{ "selected" }} @endif>
                            {{ $traction->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>




