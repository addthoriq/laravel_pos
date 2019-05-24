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
              <th>Tanggal</th>
              <th>Aksi</th>
            </thead>
            {{-- @foreach ($data as $row)
              @include('admin.product.category.modal')
            @endforeach --}}
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@section('script')
  <script type="text/javascript">
    $(function() {
      $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('category.table') }}',
        columns: [
          {data: 'id', searchable: true, orderable: true},
          {data: 'name', searchable: true, orderable: true},
          {data: 'created_at', searchable: true, orderable: true},
          {data: 'action', searchable: false, orderable: false},
        ],
      });
    });
  </script>
@endsection