<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-align-center"></i> Filter</h4>
      </div>

      <form method="get" action="{{ route('report.index') }}">
       
        <div class="modal-body">

          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="inputNama" class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-10">
                  <select class="form-control" name="tahun">
                      <option value="">-- Pilih Tahun --</option>
                    @for ($i = 2010; $i < 2020; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="inputNama" class="col-sm-2 control-label">Bulan</label>
                <div class="col-sm-10">
                  <select class="form-control" name="bulan">
                      <option value="">-- Pilih Bulan --</option>
                    @for ($i = 1; $i <= 12 ; $i++)
                      <option value="{{$i}}">{{date('F', mktime(0,0,0,$i,1))}}</option>
                    @endfor
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="inputNama" class="col-sm-2 control-label">Petugas Kasir</label>
                <div class="col-sm-10">
                  <select class="form-control" name="kasir">
                      <option value="">-- Pilih Kasir --</option>
                    @foreach ($users as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
          <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-align-center"></i> Filter</button>
        </div>
      </form>


    </div>
  </div>
</div>
