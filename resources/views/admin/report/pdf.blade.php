<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
  <h5 class="text-center" style="text-transform: uppercase;"><i class="fa fa-shopping-cart"></i> Laporan Pesanan Pelanggan</h5>
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nomor Meja</th>
        <th>Pembayaran</th>
        <th>Total</th>
        <th>Kasir</th>
        <th>Dibeli pada</th>
      </tr>
    </thead>
      @php
        $nomor    = 1;
        function rupiah($m)
        {
            $rupiah = "Rp ".number_format($m,0,",",".").",-";
            return $rupiah;
        }
      @endphp
    <tbody>
      @foreach ($data as $row)
      <tr>
        <td>{{$nomor++}}</td>
        <td>{{$row->table_number}}</td>
        <td>{{$row->payment->name}}</td>
        <td>{{rupiah($row->total)}}</td>
        <td>{{$row->user->name}}</td>
        <td>{{date('d F Y | H:i', strtotime($row->created_at))}} WIB</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>