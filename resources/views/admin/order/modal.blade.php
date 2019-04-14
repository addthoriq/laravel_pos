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
          <div class="row">
              <b class="col-sm-4">Nomor Meja</b>
              <div class="col-sm-8">: {{ $row->table_number }}</div>
          </div>
          @foreach($row->orderDetail as $detail)
              <div class="row">
                  <b class="col-sm-4">Pesanan</b>
                  <div class="col-sm-8">: {{ $detail->product->name }}</div>
              </div>
              <div class="row">
                  <b class="col-sm-4">Harga</b>
                  <div class="col-sm-8">: {{ rupiah($detail->product->price) }}</div>
              </div>
              <div class="row">
                  <b class="col-sm-4">Jumlah</b>
                  <div class="col-sm-8">: {{ $detail->quantity }}</div>
              </div>
              <div class="row">
                  <b class="col-sm-4">Catatan</b>
                  <div class="col-sm-8">: {{ $detail->note }}</div>
              </div>
        @endforeach
        <div class="row">
            <b class="col-sm-4">Total Pembayaran</b>
            <div class="col-sm-8">: {{ rupiah($row->total) }}</div>
        </div>
        <div class="row">
            <b class="col-sm-4">Jenis Pembayaran</b>
            <div class="col-sm-8">: {{ $row->payment->name }}</div>
        </div>
        <div class="row">
            <b class="col-sm-4">Petugas Kasir</b>
            <div class="col-sm-8">: {{ $row->user->name }}</div>
        </div>
        <div class="row">
            <b class="col-sm-4">Waktu</b>
            <div class="col-sm-8">: {{ date('d F Y H:i', strtotime($row->created_at)) }}</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{url('admin/order/'.$row->id.'/edit')}}" class="btn btn-primary">Ubah</a>
      </div>
    </div>
  </div>
</div>
