@if (session()->has('message'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="fa fa-bell-o" aria-hidden="true"></i> Alert!</h5>
        {{ session()->get('message') }}
    </div>
@endif

