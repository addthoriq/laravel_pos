@if (session()->has('failed'))
    <div class="box-body">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Gagal</h4>
            {{session()->get('failed')}}
        </div>
    </div>
@endif
