@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="fa fa-bell-o" aria-hidden="true"></i> Alert!</h5>
        {{ session()->get('warning') }}
    </div>
@endif

