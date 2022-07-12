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
        <h3 class="box-title">Add Data Bahan Habis Pakai</h3>
      </div>

      <div class="box-body">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> 
                Add Bahan Habis Pakai
        </button>
      </div>
       <!-- /.box-header -->
       <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Data Bahan Habis Pakai</h4>
              </div>

              <form role="form" action="{{url("/bahan/store")}}" method="post">
                      {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Bahan</label>
                  <input type="text" class="form-control"  name="nama_bahan" required>
                </div>

                <div class="form-group">
                  <label>Satuan</label>
                  <input type="text" class="form-control" name="satuan_bahan" required>
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga_bahan" required>
                </div>

                <div class="form-group">
                  <label>Stok Minimum</label>
                  <input type="number" class="form-control" name="stok_min" required>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                   <textarea class="form-control" rows="3" name="keterangan" required></textarea>
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
                <th>Kode Bahan</th>
                <th>Nama Bahan</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Stok Minimum</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
           @foreach($bahan as $data)
            <tr>
                <td>{{ $data->kode_bahan }}</td>
                <td>{{ $data->nama_bahan }}</td>
                <td>{{ $data->satuan }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->stok_min }}</td>
                <td>{{ $data->keterangan }}</td>
                <td>
                    <a href="{{('/bahan/edit/'.$data->kode_bahan)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>

                    <a class="btn btn-danger" onclick="hapusBahan({{$data->kode_bahan}})"><i class="fa fa-trash-o"></i></a>
            </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
                <th>Kode Bahan</th>
                <th>Nama Bahan</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Stok Minimum</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection