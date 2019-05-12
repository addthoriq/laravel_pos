<div id="app">
  <div class="modal fade" id="{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 900px">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-shopping-cart"></i> Detail Pembelanjaan</h4>
        </div>

        <div class="modal-body">
          
          <div class="row">
            <div class="col-sm-4">
              <h5>Di pesan pada</h5>
                <address>
                  <b>{{date('d F Y', strtotime($row->created_at))}}</b><br>
                  <b>{{date('H:i', strtotime($row->created_at))}} WIB</b>
                </address>
            </div>
            <div class="col-sm-4">
              <h5>Nomor Meja</h5>
                <address>
                  <b>{{$row->table_number}}</b>
                </address>
            </div>
            <div class="col-sm-4">
              <h5>Petugas Kasir</h5>
                <address>
                  <b>
                    {{$row->user->name}}
                  </b>
                </address>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Pesanan</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($row->orderDetail as $odt)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$odt->product_name}}</td>
                      <td>{{$odt->note}}</td>
                      <td>{{rupiah($odt->product_price)}}</td>
                      <td>{{$odt->quantity}}</td>
                      <td>{{rupiah($odt->subtotal)}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <h4>Metode Pembayaran: <b>{{$row->payment->name}}</b></h4>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-4">
                  <h5 class="text-center">
                    <b class="pull-left">Total</b>
                  </h5>
                </div>
                <div class="col-sm-8">
                  <h5 class="text-left">
                    <b>: </b>
                    <span> {{rupiah($row->orderDetail->sum('subtotal'))}}</span>
                  </h5>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <h5 class="text-center">
                    <b class="pull-left">Diskon</b>
                  </h5>
                </div>
                <div class="col-sm-8">
                  <h5 class="text-left">
                    <b>: </b>
                    <span>{{$row->discount}} %</span>
                  </h5>
                </div>
              </div>
              <div class="row" >
                <div class="col-sm-4">
                  <h5 class="text-center">
                    <b class="pull-left">Total Akhir</b>
                  </h5>
                </div>
                <div class="col-sm-8" >
                  <h5 class="text-left">
                    <b>: </b>
                    <span>{{rupiah($row->total)}}</span>
                  </h5>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <a href="{{ route('order.show', $row->id) }}" target="_blank" class="btn btn-default btn-sm pull-left"><i class="fa fa-print"></i> Cetak</a>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
        </div>
      </div>
    </div>
  </div>

</div>