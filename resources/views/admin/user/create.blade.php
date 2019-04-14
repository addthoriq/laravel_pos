@extends('layouts.app')
@section('title', 'Tambah baru User')
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
              <form class="form-horizontal" method="post" action="{{route('user.store')}}">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" value="{{old('name')}}" id="inputNama" placeholder="Nama Kasir">
                      @if ($errors->has('name'))
                          <span class="text-danger">
                              {{$errors->first('name')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" value="{{old('email')}}" id="inputEmail" placeholder="Ex: admin@admin.com">
                      @if ($errors->has('email'))
                          <span class="text-danger">
                              {{$errors->first('email')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" value="{{old('password')}}" id="inputPassword" placeholder="Masukkan Password">
                      @if ($errors->has('password'))
                          <span class="text-danger">
                              {{$errors->first('password')}}
                          </span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /.box-footer-->
                <div class="box-footer">
                    <a href="{{route('user.index')}}" class="btn btn-default">Batal</a>
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
