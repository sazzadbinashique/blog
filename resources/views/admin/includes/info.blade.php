@if ($message = Session::get('info'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

