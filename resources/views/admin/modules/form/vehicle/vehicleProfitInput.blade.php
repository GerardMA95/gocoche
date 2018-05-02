<div class="card">
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
            <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                <div class="md-form">
                    <i class="fas fa-euro-sign prefix light-blue-text"></i>
                    <input type="text" name="profit" id="profit" class="form-control" disabled
                           value="{{ $item->profit }}">
                    <label for="profit">Beneficio</label>
                </div>
            </div>
            <div class="form-group col-12 col-lg-6 light-blue-text mx-auto">
                <div class="md-form">
                    <i class="fas fa-percent prefix light-blue-text"></i>
                    <input type="number" name="margin" min="0" max="400000" step="100" id="margin"
                           class="form-control" disabled
                           value="{{ $item->margin }}">
                    <label for="margin">Margen</label>
                </div>
            </div>
        </div>
    </div>
</div>