@if(Session::has('status'))

    <div class="alert alert-info">
        {{session('status')}}
    </div>

@endif