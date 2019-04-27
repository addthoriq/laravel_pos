<div class="modal fade" id="{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 800px">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-coffee"></i> Detail Item</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Kategori</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Dibuat pada</th>
                  <th>Dirubah Pada</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$row->category->name}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{rupiah($row->price)}}</td>
                  <td>{{($row->status)?'Ada':'Habis'}}</td>
                  <td>{{date('d F Y', strtotime($row->created_at))}} - {{date('H:i', strtotime($row->created_at))}} WIB</td>
                  <td>{{date('d F Y', strtotime($row->updated_at))}} - {{date('H:i', strtotime($row->updated_at))}} WIB</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
        <a href="{{url('admin/item/'.$row->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="fa fa-cog"></i> Ubah</a>
      </div>
    </div>
  </div>
</div>
