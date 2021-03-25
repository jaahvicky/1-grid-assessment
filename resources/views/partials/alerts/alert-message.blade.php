@if ($message = Session::get('success'))
    <div class="alert alert-soft-success d-flex btn-success" role="alert">
        <span class="pe pe-7s-check s-10"></span>
        <span class="text-body"> {{$message }}</span>
    </div>
@endif
@if ($message = Session::get('alert-success'))
    <div class="alert alert-soft-success d-flex btn-success" role="alert">
        <span class="pe pe-7s-check  s-10 color-white"></span>
        <span class="text-body color-white"> {{$message }}</span>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-soft-danger d-flex btn-danger" role="alert"> 
        <span class="pe pe-7s-close-circle  s-10 color-white"></span>
        <span class="text-body color-white"> {{$message }}</span>
    </div>
@endif
@if ($message = Session::get('alert-error'))
    <div class="alert alert-soft-danger d-flex btn-danger" role="alert">
        <span class="pe pe-7s-close-circle  s-10 color-white"></span>
        <span class="text-body color-white"> {{$message }}</span>
    </div>
@endif