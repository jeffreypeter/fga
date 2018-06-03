@if(Session::has('message'))
    <div class="alert alert-{{Session::get('status')}} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{Session::get('message')}}
    </div>
@endif