<div class="row justify-content-center no-gutters" id="{{ $type }}-alert-container">
    <div class="col-md-6 pt-4">
        <div class="alert alert-{{ $type }} fade show mb-0" alert-type="{{ $type }}">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $slot }}
        </div>
    </div>
</div>
