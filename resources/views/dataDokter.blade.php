@extends('layouts.index')

@section('content')
@if(\Session::has("alert-success"))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <div>{{Session::get("alert-success")}}</div>
    </div>
@endif

<div class="row">
  <div class="col-xs-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Add Data Dokter</h3>
      </div>

      <div class="box-body">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> 
                Add Dokter
        </button>
      </div>
       <!-- /.box-header -->
       <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Data Dokter</h4>
              </div>

              <form role="form" action="{{url("/dokter/store")}}" method="post">
                      {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Dokter</label>
                  <input type="text" class="form-control"  name="nama_dokter" required>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" required></textarea>
                </div>

                <div class="form-group">
                  <label>No. Telp</label>
                  <input type="number" class="form-control" name="no_telp" required>
                </div>

                <div class="form-group">
                  <label>Tangggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" required>
                </div>

                <div class="form-group">
                  <label>Rate</label>
                  <input type="text" class="form-control" name="rate" required>
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
              <th>Kode Dokter</th>
              <th>Nama Dokter</th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th>Tanggal Lahir</th>
              <th>Rate</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
           @foreach($dokter as $data)
            <tr>
              <td>{{ $data->kode_dokter }}</td>
              <td>{{ $data->nama_dokter }}</td>
              <td>{{ $data->alamat }}</td>
              <td>{{ $data->no_telp }}</td>
              <td>{{ $data->tgl_lahir }}</td>
              <td>{{ $data->rate }}</td>
              <td>
                    <a href="{{("/dokter/edit/".$data->kode_dokter)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>

                    <a class="btn btn-danger" onclick="hapusDokter({{$data->kode_dokter}})"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
              <th>Kode Dokter</th>
              <th>Nama Dokter</th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th>Tanggal Lahir</th>
              <th>Rate</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

