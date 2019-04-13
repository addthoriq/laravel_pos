<div class="modal fade" id="{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rincian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Kategori </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{$row->category->name}}</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Nama </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{$row->name}}</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Harga </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{rupiah($row->price)}}</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                      <label for="">Status </label>
                  </div>
                  <div class="col-sm-2">
                      <label for="">= </label>
                  </div>
                  <div class="col-sm-6">
                      <p>{{($row->status)?'Ada':'Habis'}}</p>
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
        <a href="{{url('admin/item/'.$row->id.'/edit')}}" class="btn btn-primary">Ubah</a>
      </div>
    </div>
  </div>
</div>
