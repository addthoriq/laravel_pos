<div class="modal fade" id="{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        <h5 class="modal-title" id="exampleModalLabel">Rincian</h5>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Nomor Meja </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{$row->table_number}}</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Total </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{rupiah($row->total)}}</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Jenis Pembayaran </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{$row->payment->name}}</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Petugas Kasir </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{$row->user->name}}</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Dibuat pada </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{date('d F Y H:i', strtotime($row->created_at))}}</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Dirubah pada </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{date('d F Y H:i', strtotime($row->updated_at))}}</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{url('admin/order/'.$row->id.'/edit')}}" class="btn btn-primary">Ubah</a>
      </div>
    </div>
  </div>
</div>
