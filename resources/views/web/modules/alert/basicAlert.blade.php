<div class="alert alert-{{ $alert->type }}">
    <div class="container">
        <div class="alert-icon">
            <i class="material-icons">error_outline</i>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
        </button>
        <strong>{{ $alert->message }}</strong>
    </div>
</div>