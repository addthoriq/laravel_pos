@extends('layouts.app')
@section('title', 'Edit Item')
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
              <form class="form-horizontal" method="post" action="{{route('item.update',$data->id)}}">
                  @csrf
                  @method('PUT')
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="category">
                              <option value="{{$data->category_id}}">-- {{$data->category->name}} --</option>
                          @foreach ($cat as $row)
                              <option value="{{$row->id}}">{{$row->name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('category'))
                          <span class="text-danger">
                              {{$errors->first('category')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" value="{{$data->name}}" id="inputNama" placeholder="Nama">
                      @if ($errors->has('name'))
                          <span class="text-danger">
                              {{$errors->first('name')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputHarga" class="col-sm-2 control-label">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" name="price" class="form-control" value="{{$data->price}}" id="inputHarga" placeholder="ex: 12000">
                      @if ($errors->has('price'))
                          <span class="text-danger">
                              {{$errors->first('price')}}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="radio col-sm-10">
                        <label for="optionsRadios1">
                            <input type="radio" name="status" id="optionsRadios1" value="1" {{($data->status)?'checked':''}}>
                            Ada
                        </label><br>
                        <label for="optionsRadios2">
                            <input type="radio" name="status" id="optionsRadios2" value="0" {{($data->status)?'':'checked'}}>
                            Habis
                        </label><br>
                        @if ($errors->has('status'))
                            <span class="text-danger">
                                {{$errors->first('status')}}
                            </span>
                        @endif
                    </div>
                  </div>
                </div>
                <!-- /.box-footer-->
                <div class="box-footer">
                    <a href="{{route('item.index')}}" class="btn btn-default">Batal</a>
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
