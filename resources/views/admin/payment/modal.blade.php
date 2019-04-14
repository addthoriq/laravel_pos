<div class="modal fade" id="{{$row->name}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        <h5 class="modal-title" id="exampleModalLabel">Rincian</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <b class="col-sm-4">Nama</b>
          <div class="col-sm-8">: {{ $row->name }}</div>
        </div>
        <div class="row">
          <b class="col-sm-4">Status</b>
          <div class="col-sm-8">: {{ ($row->status)?'Ada':'Habis' }}</div>
        </div>
        <div class="row">
            <b class="col-sm-4">Dibuat pada</b>
            <div class="col-sm-8">: {{ date('d F Y H:i', strtotime($row->created_at)) }}</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{url('admin/payment/'.$row->id.'/edit')}}" class="btn btn-primary">Ubah</a>
      </div>
    </div>
  </div>
</div>
