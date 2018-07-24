@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        <i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('message') }}
    </div>
@endif