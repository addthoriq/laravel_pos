@extends('layouts.app')
@section('title', 'Beranda Kategori')
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
          <div class="box-body">
              @include('layouts.alert')
              <a href="{{route('category.create')}}" class="btn btn-primary btn-sm pull-right">Tambah</a>
              <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                      <tr role="row">
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nomor: activate to sort column ascending">Nomor</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending">Nama</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                          $nomor    = 1;
                      @endphp
                      @foreach ($data as $row)
                          <tr role="row" class="odd">
                            <td>{{$nomor++}}</td>
                            <td>{{$row->name}}</td>
                            <td>
                                <form action="{{route('category.destroy',$row->id)}}" method="post">
                                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{$row->name}}">Rincian</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick='javascript:return confirm("Apakah anda yakin ingin menghapus data ini?")'>Hapus</button>
                                </form>
                            </td>
                          </tr>
                         @include('admin.product.category.modal')
                      @endforeach
                  </tbody>
                  <tfoot>
                      <tr role="row">
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nomor: activate to sort column ascending">Nomor</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending">Nama</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Action</th>
                      </tr>
                  </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                    @if ($data->total()>5)
                        Menampilkan 1 sampai 5 dari {{$data->total()}} data
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
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->



      </section>
      <!-- /.content -->
    </div>
@endsection
