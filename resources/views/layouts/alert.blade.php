@if (session()->has('success'))
    <div class="box-body">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil</h4>
            {{session()->get('success')}}
        </div>
    </div>
@endif
