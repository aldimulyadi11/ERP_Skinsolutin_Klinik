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
              @foreach($perawatan as $data)
              <form role="form" action="{{url("/perawatan/update")}}" method="post">
                      {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" value="{{ $data->kode_perawatan}}" name="kode_perawatan" required>
                </div>

                <div class="form-group">
                  <label>Nama Perawatan</label>
                  <input type="text" class="form-control" value="{{ $data->nama_perawatan}}" name="nama_perawatan" required>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" rows="3" name="keterangan" required>{{ $data->keterangan }}</textarea>
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" value="{{ $data->harga}}" name="harga_perawatan" required>
                </div>

                <div class="form-group">
                  <label>Dokter</label>
                  <select class="form-control" name="kode_dokter" required>
                      <option disabled selected value>{{ $data->nama_dokter }}</option>
                    @endforeach
                      @foreach($dokter as $data)
                      <option value="{{ $data->kode_dokter }}">{{ $data->nama_dokter }}</option>
                      @endforeach
                  </select>
                </div>
                @foreach($perawatan as $data)
                <div class="form-group">
                  <label>High Technology Machine</label>
                  <input type="text" class="form-control" value="{{ $data->high_technology }}" name="high_technology" required>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="modal-footer">
                <a href="{{url("/dataPerawatan")}}" class="btn btn-warning pull-left">Cancel</a>
                
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



