@if ($message = Session::get('success'))

<div class="alert custom-alert-1 shadow-sm alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert"
        aria-label="Close">
    </button>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert custom-alert-1 shadow-sm alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}
    <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert"
        aria-label="Close">
    </button>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert custom-alert-1 shadow-sm alert-warning alert-dismissible fade show" role="alert">
    {{ $message }}
    <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert"
        aria-label="Close">
    </button>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert custom-alert-1 shadow-sm alert-info alert-dismissible fade show" role="alert">
    {{ $message }}
    <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert"
        aria-label="Close">
    </button>
</div>
@endif

@if ($errors->any())
    <div class="alert custom-alert-1 shadow-sm alert-danger alert-dismissible fade show" role="alert">
        {{ "Something went wrong !" }}
        <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert"
            aria-label="Close">
        </button>
    </div>
@endif
