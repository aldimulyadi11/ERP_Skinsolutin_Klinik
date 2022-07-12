@extends('layouts.index')

@section('content')
@if(\Session::has("alert-success"))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <div>{{Session::get("alert-success")}}</div>
    </div>
@endif

@if(\Session::has("alert-danger"))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <div>{{Session::get("alert-danger")}}</div>
    </div>
@endif

<div class="row">
  <div class="col-xs-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Add Data Perawatan</h3>
      </div>

      <div class="box-body">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> 
                Add Data Perawatan
        </button>
      </div>
       <!-- /.box-header -->
       <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Data Perawatan</h4>
              </div>

              <form role="form" action="{{url("/perawatan/store")}}" method="post">
                      {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Perawatan</label>
                  <input type="text" class="form-control"  name="nama_perawatan" required>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" rows="3" name="keterangan" required></textarea>
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga_perawatan" required>
                </div>

                <div class="form-group">
                  <label>Dokter</label>
                  <select class="form-control" name="kode_dokter" required>
                      <option disabled selected value>-- Pilih Dokter --</option>
                      @foreach($dokter as $data)
                      <option value="{{ $data->kode_dokter }}">{{ $data->nama_dokter }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>High Technology Machine</label>
                  <input type="text" class="form-control" name="high_technology" required>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-warning pull-left waves-effect">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode Perawatan</th>
              <th>Nama Perawatan</th>
              <th>Keterangan</th>
              <th>Harga</th>
              <th>Dokter</th>
              <th>High Technology Machine</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
             @foreach($perawatan as $data)
             <tr>
                <td>{{ $data->kode_perawatan }}</td>
                <td>{{ $data->nama_perawatan }}</td>
                <td>{{ $data->keterangan }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->nama_dokter }}</td>
                <td>{{ $data->high_technology }}</td>
                <td>
                    <a href="{{("/perawatan/edit/".$data->kode_perawatan)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>

                    <a class="btn btn-danger" onclick="hapusPerawatan({{$data->kode_perawatan}})"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
              <th>Kode Perawatan</th>
              <th>Nama Perawatan</th>
              <th>Keterangan</th>
              <th>Harga</th>
              <th>Oleh Dokter</th>
              <th>High Technology Machine</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection