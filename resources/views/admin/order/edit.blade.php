@extends('layouts.app')
@section('title', 'Ubah Pesanan')
@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Blank page
          <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Examples</a></li>
          <li class="active">Blank page</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <form class="form-horizontal" method="post" action="{{route('order.update',$data->id)}}">
                  @csrf
                  @method('PUT')
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Nomor Meja</label>
                    <div class="col-sm-10">
                      <input type="text" name="table_number" class="form-control" value="{{$data->table_number}}" id="inputNama" placeholder="ex: 12">
                      @if ($errors->has('table_number'))
                          <span class="text-danger">
                              {{$errors->first('table_number')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Pesanan</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="pesanan">
                          <option value="{{$ord->product_id}}">-- {{$ord->product->name}} --</option>
                          @foreach ($pro as $mow)
                              <option value="{{$mow->id}}">{{$mow->name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('pesanan'))
                          <span class="text-danger">
                              {{$errors->first('pesanan')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputHarga" class="col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                      <input type="text" name="jumlah" class="form-control" value="{{$ord->quantity}}" id="inputHarga" placeholder="ex: 2">
                      @if ($errors->has('jumlah'))
                          <span class="text-danger">
                              {{$errors->first('jumlah')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Jenis Pembayaran</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="payment">
                          <option value="{{$data->payment_id}}">-- {{$data->payment->name}} --</option>
                          @foreach ($pay as $row)
                              <option value="{{$row->id}}">{{$row->name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('payment'))
                          <span class="text-danger">
                              {{$errors->first('payment')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Catatan</label>
                    <div class="col-sm-10">
                      <input type="text" name="note" class="form-control" value="{{$ord->note}}" id="inputNama" placeholder="ex: 12">
                      @if ($errors->has('note'))
                          <span class="text-danger">
                              {{$errors->first('note')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Petugas Kasir</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="user">
                          <option value="{{$data->created_by}}">-- {{$data->user->name}} --</option>
                          @foreach ($usr as $rows)
                              <option value="{{$rows->id}}">{{$rows->name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('user'))
                          <span class="text-danger">
                              {{$errors->first('user')}}
                          </span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /.box-footer-->
                <div class="box-footer">
                    <a href="{{route('order.index')}}" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-primary pull-right">Ubah</button>
                </div>
              </form>
          </div>
        </div>
        <!-- /.box -->



      </section>
      <!-- /.content -->
    </div>
@endsection
