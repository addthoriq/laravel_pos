<table>
  <thead>
    <tr>
      <th colspan="6"><b>Laporan Pesanan Pelanggan Bulan {{date('F Y')}}</b></th>
    </tr>
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
    @foreach ($orders as $row)
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