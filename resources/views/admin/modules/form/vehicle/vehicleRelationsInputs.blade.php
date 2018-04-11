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




