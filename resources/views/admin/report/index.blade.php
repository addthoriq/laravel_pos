@extends('layouts.app')
@section('title', 'Beranda Pesan')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Laporan Pesanan Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#filter">Filter <i class="fa fa-align-center"></i></button>
          @include('admin.report.filter')
          <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#download">Download  <i class="fa fa-cloud-download"></i></a>
          @include('admin.report.download')
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
        @include('layouts.fail')
          <table class="table table-bordered table-hover dataTable text-center">
            <thead>
              <th>Nomor</th>
              <th>Nomor Meja</th>
              <th>Pembayaran</th>
              <th>Total</th>
              <th>Kasir</th>
              <th></th>
            </thead>
            <tbody>
              @php
                $nomor    = 1;
                function rupiah($m)
                {
                    $rupiah = "Rp ".number_format($m,0,",",".").",-";
                    return $rupiah;
                }
              @endphp
              @foreach ($data as $row)
              <tr role="row" class="odd">
                <td>{{$nomor++}}</td>
                <td>{{$row->table_number}}</td>
                <td>{{$row->payment->name}}</td>
                <td>{{rupiah($row->total)}}</td>
                <td>{{$row->user->name}}</td>
                <td>
                  <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{$row->id}}"><i class="fa  fa-chevron-circle-right "></i></a>
                  @include('admin.order.modal')
                </td>
              </tr>
              @endforeach
              @if (count($data)==0)
              <tr role="row" class="odd">
                <td colspan="6">Data Tidak Tersedia</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="box-footer">
          <div class="row">
              <div class="col-sm-5">
                  <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                      @if ($data->total()>10)
                          Menampilkan 1 sampai 10 dari {{$data->total()}} data
                          @else
                              Menampilkan {{$data->total()}} data
                      @endif
                  </div>
              </div>
              <div class="col-sm-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                      {{$data->links()}}
                  </div>
              </div>
          </div> 
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
