<div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-cloud-download"></i> Download</h4>
      </div>
       
      <form class="form-horizontal" method="get" action="{{ route('report.download') }}">
        <div class="modal-body">

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


            <div class="form-group">
              <label for="inputNama" class="col-sm-2 control-label">Kasir</label>
              <div class="col-sm-10">
                <select class="form-control" name="kasir">
                  <option value="">-- Pilih Petugas Kasir --</option>
                  @foreach ($users as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Download</label>
              <div class="radio col-sm-10">
                <label for="optionsRadios1" class="col-sm-2">
                    <input type="radio" name="tipe" id="optionsRadios1" value="1">
                    PDF
                </label>
                <label for="optionsRadios2" class="col-sm-2">
                    <input type="radio" name="tipe" id="optionsRadios2" value="0">
                    EXCEL
                </label>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
          <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-cloud-download"></i> Download</button>
        </div>
      </form>



    </div>
  </div>
</div>
