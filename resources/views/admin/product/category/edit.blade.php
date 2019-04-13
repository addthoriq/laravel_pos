@extends('layouts.app')
@section('title', 'Ubah Kategori')
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
              <form class="form-horizontal" method="post" action="{{route('category.update',$data->id)}}">
                  @csrf
                  @method('PUT')
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputNama" placeholder="Nama" value="{{$data->name}}">
                      @if ($errors->has('name'))
                          <span class="text-danger">
                              {{$errors->first('name')}}
                          </span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /.box-footer-->
                <div class="box-footer">
                    <a href="{{route('category.index')}}" class="btn btn-default">Batal</a>
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
