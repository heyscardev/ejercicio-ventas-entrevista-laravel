@if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}<i class="material-icons left i-white">message</i>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-error">
        {{Session::get('error')}}<i class="material-icons left i-white">message</i>
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning">
        {{Session::get('warning')}}<i class="material-icons left i-white">message</i>
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info">
        {{Session::get('info')}}<i class="material-icons left i-white">info</i>
    </div>
@endif

{{Session::forget(['success','error','warning','info'])}}