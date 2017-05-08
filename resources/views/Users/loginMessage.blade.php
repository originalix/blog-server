@if(isset($success))
    <div class="alert alert-success" role="alert">
        {{ $success }}
    </div>
@endif

@if(isset($error))
    <div class="alert alert-danger" role="alert">
        <strong>{{ $error }}</strong>
    </div>
@endif