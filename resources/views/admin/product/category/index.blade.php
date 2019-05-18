@extends('layouts.app')
@section('title', 'Beranda Kategori')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Menentukan Kategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <a href="{{route('category.create')}}" class="btn btn-info btn-sm">Tambah <i class="fa fa-plus-circle"></i></a>
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
        @include('layouts.alert')
          <table class="table table-bordered text-center" id="table">
            <thead>
              <th>Nomor</th>
              <th>Nama</th>
            </thead>
            <tbody>
              @php
                $nomor = 1;
              @endphp
              @foreach ($data as $row)
                <tr role="row" class="odd">
                  <td>{{$nomor++}}</td>
                  <td>{{$row->name}}</td>
                  <td>
                      <form action="{{route('category.destroy',$row->id)}}" method="post">
                          <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{$row->name}}"><i class="fa  fa-chevron-circle-right "></i></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick='javascript:return confirm("Apakah anda yakin ingin menghapus data ini?")'><i class="fa fa-trash"></i></button>
                      </form>
                    @include('admin.product.category.modal')
                  </td>
                </tr>
              @endforeach
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
@section('script')
  <script type="text/javascript">
    $(function() {
      var oTable = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('category.table') }}',
        columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'}
        ]
      });
    });
  </script>
@endsection