@extends('layouts.app')
@section('title', 'Tambah baru Pesanan')
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
              <form class="form-horizontal" method="post" action="{{route('order.store')}}">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Nomor Meja</label>
                    <div class="col-sm-10">
                      <input type="text" name="table_number" class="form-control" value="{{old('table_number')}}" id="inputNama" placeholder="ex: 12">
                      @if ($errors->has('table_number'))
                          <span class="text-danger">
                              {{$errors->first('table_number')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputHarga" class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-10">
                      <input type="text" name="total" class="form-control" value="{{old('total')}}" id="inputHarga" placeholder="ex: 12000">
                      @if ($errors->has('total'))
                          <span class="text-danger">
                              {{$errors->first('total')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Jenis Pembayaran</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="payment">
                          <option value="">-- Pilih Jenis Pembayaran --</option>
                          @foreach ($data as $row)
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
                    <label for="inputNama" class="col-sm-2 control-label">Petugas Kasir</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="user">
                          <option value="">-- Pilih Kasir --</option>
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
                    <button type="submit" class="btn btn-info pull-right">Tambah</button>
                </div>
              </form>
          </div>
        </div>
        <!-- /.box -->



      </section>
      <!-- /.content -->
    </div>
@endsection
