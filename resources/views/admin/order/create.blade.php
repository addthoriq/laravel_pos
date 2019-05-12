@extends('layouts.app')
@section('title', 'Beranda Pesan')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pesanan
        <small>Tambah Pesanan Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Pesanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <a href="{{route('order.index')}}" class="btn btn-warning"><i class="fa fa-arrow-circle-left "></i> Kembali</a>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="post" action="{{route('order.store')}}">
          @csrf
          <div class="box-body">

            <div class="row">
              <div class="col-sm-3">
                <h5><b>Petugas Kasir</b></h5>
              </div>
              <div class="col-sm-3">
                <h5><b>Tanggal Pemesanan</b></h5>
              </div>
              <div class="col-sm-3">
                <h5><b>Nomor Meja</b></h5>
              </div>
              <div class="col-sm-3">
                <h5><b>Metode Pembayaran</b></h5>
              </div>
            </div>

           <div class="row">
              
              <div class="col-sm-3">
                <input type="text" name="user_id" value="{{auth()->user()->name}}" class="form-control" disabled>
              </div>
              <div class="col-sm-3">
                <input type="text" name="created_at" value="{{date('d F Y')}}" class="form-control" disabled>
              </div>
              <div class="col-sm-3">
                <input type="text" name="table_number" class="form-control" value="{{old('table_number')}}" id="inputNama" placeholder="ex: 12">
              </div>
              <div class="col-sm-3">
                <select class="form-control" name="payment_id">
                  <option value="">Jenis Pembayaran</option>
                  @foreach ($data as $row)
                      @if ($row->status)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                      @endif
                  @endforeach
                </select>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-12">
                <h5><b>Tambah Pesanan</b></h5>
              </div>
            </div>

            <div class="row" id="app">
              
              <div class="col-sm-12">
                <div class="row" v-for="(order, index) in orders" :key="index">
                  <div>
                    <div class="col-sm-3">
                      <select class="form-control" name="pesanan[]" v-model="order.pesanan">
                        @foreach ($pro as $mow)
                          @if ($mow->status)
                            <option value="{{$mow->id}}">{{$mow->name}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <input type="hidden" name="nama[]" :value="product_name(order.pesanan, index)">
                    <input type="hidden" name="harga[]" :value="product_price(order.pesanan, index)">
                    <div class="col-sm-2">
                      <input type="number" name="jumlah[]" class="form-control" value="{{old('jumlah')}}" id="inputJumlah" placeholder="ex: 2" v-model="order.jumlah">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="note[]" class="form-control" value="{{old('note')}}" id="inputNote" placeholder="Catatan" v-model="order.note">
                    </div>
                    <div class="col-sm-2">
                      <input type="text" name="subtotal[]" class="form-control" readonly v-model="order.subtotal" :value="subtotal(order.pesanan, order.jumlah, index)">
                    </div>
                    <button type="button" class="btn btn-danger" @click="delOrder(index)"><i class="fa fa-trash"></i></button>
                  </div>
                  <br>
                </div>

                <div class="row">
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-success btn-sm" @click="addOrder()" ><i class="fa fa-plus"></i></button>
                  </div>
                </div>

                <br>
                
                <div class="row">
                  <div class="col-sm-12">
                    <h5><b>Diskon</b></h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-2">
                    <input type="number" name="discount" class="form-control" placeholder="Diskon" v-model="discount">
                  </div>
                  <input type="hidden" name="total" :value="total" readonly="">
                  <div class="col-sm-8" style="font-size: 24px">
                      Total: Rp <span>@{{rupiah(total)}}</span>
                  </div>
                </div>
              
              </div>

            </div>
              
          </div>

          <div class="box-footer">
            <div class="row">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus-circle"></i> Tambah</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script type="text/javascript">
  new Vue({
    el: '#app',
    data: {
      orders: [
        {pesanan: 0, nama: "", harga: 0, jumlah: 1, subtotal: 0},
      ],
      discount: 0,
    },
    methods: {
      addOrder(){
        var orders = {pesanan: 0, nama: "", harga: 0, jumlah: 1, subtotal: 0};
        this.orders.push(orders);
      },
      delOrder(index){
        if (index > 0){
          this.orders.splice(index,1);
        }
      },
      subtotal(pesanan, jumlah, index){
        var subtotal  = this.produk[pesanan]*jumlah;
        this.orders[index].subtotal = subtotal;
        return subtotal;
      },
      rupiah(total){
        let val = (total/1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      },
      product_name(pesanan, index){
        var product_name = this.nama[pesanan];
        this.orders[index].nama = product_name;
        return product_name;
      },
      product_price(pesanan, index){
        var product_price = this.produk[pesanan];
        this.orders[index].harga = product_price;
        return product_price;
      },
    },
    computed: {
      produk(){
        let produk  = [];
        produk[0] = 0;
        @foreach ($pro as $produk)
          produk[{{$produk->id}}]  = {{$produk->price}}
        @endforeach
        return produk;
      },
      nama(){
        let produk  = [];
        produk[0] = 0;
        @foreach ($pro as $produk)
          produk[{{$produk->id}}]  = "{{$produk->name}}"
        @endforeach
        return produk;
      },
      total(){
        var total = this.orders
        .map(order=>order.subtotal)
        .reduce((prev, next)=>prev+next);

        return total - (total * this.discount / 100);
      },
    }
  });
</script>
@endsection