@extends('layouts.index')

@section('content')
<!-- Exportable Table -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-default">      
      
      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Update Data Dokter</h4>
              </div>
              @foreach($dokter as $data)
              <form role="form" action="{{url("/dokter/update")}}" method="post">
                      {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" value="{{ $data->kode_dokter }}" class="form-control"  name="kode_dokter">
                </div>

                <div class="form-group">
                  <label>Nama Dokter</label>
                  <input type="text" value="{{ $data->nama_dokter }}" class="form-control"  name="nama_dokter">
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3"  name="alamat">{{ $data->alamat }}</textarea>
                </div>

                <div class="form-group">
                  <label>No. Telp</label>
                  <input type="number" class="form-control" value="{{ $data->no_telp }}" name="no_telp">
                </div>

                <div class="form-group">
                  <label>Tangggal Lahir</label>
                  <input type="date" value="{{ $data->tgl_lahir }}" class="form-control" name="tanggal_lahir">
                </div>

                <div class="form-group">
                  <label>Rate</label>
                  <input type="text" value="{{ $data->rate }}" class="form-control" name="rate">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="modal-footer">
                <a href="{{url("/dataDokter")}}" class="btn btn-warning pull-left">Cancel</a>
                
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
            @endforeach
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
</div>
</div>
<!-- #END# Exportable Table -->
@endsection



