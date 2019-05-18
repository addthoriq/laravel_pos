<!DOCTYPE html>
<html>
<head>
  <title>
    Print
  </title>
  @include('layouts.part.link')
</head>
<body onload="window.print();">
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Sarkop
          <small class="pull-right">Tanggal: {{date('d F Y', strtotime($data->created_at))}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
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
              function rupiah($m)
              {
                  $rupiah = "Rp ".number_format($m,0,",",".").",-";
                  return $rupiah;
              }
            @endphp
            @foreach ($data->orderDetail as $odt)
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
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- /.col -->
      <div class="col-xs-12">
        <p class="lead">Amount Due {{date('d F Y', strtotime($data->created_at))}}</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total</th>
              <td>: {{rupiah($data->orderDetail->sum('subtotal'))}}</td>
            </tr>
            <tr>
              <th>Diskon</th>
              <td>: {{$data->discount}} %</td>
            </tr>
            <tr>
              <th>Total Akhir</th>
              <td>: {{rupiah($data->total)}}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</body>
</html>