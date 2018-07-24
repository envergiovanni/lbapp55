@if ($errors->any())
    <div class="alert alert-danger">
        <h6><i class="fa fa-exclamation-circle"></i>&nbsp;No se pudo enviar su mensaje</h6>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif