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
        <h3 class="box-title">Add Data Produk</h3>
      </div>

      <div class="box-body">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> 
                Add Produk
        </button>
      </div>
       <!-- /.box-header -->
       <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Data Produk</h4>
              </div>

              <form role="form" action="{{url("/produk/store")}}" method="post">
                      {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control"  name="nama_produk" required>
                </div>

                <div class="form-group">
                  <label>Ukuran (ml)</label>
                  <input type="text" class="form-control"  name="ukuran_produk" required>
                </div>

                <div class="form-group">
                  <label>Harga Beli</label>
                  <input type="number" class="form-control" name="harga_beli" required>
                </div>

                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="number" class="form-control" name="harga_jual" required>
                </div>

                <div class="form-group">
                  <label>Stok Minimum</label>
                  <input type="number" class="form-control" name="stok_minimum" required>
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
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Ukuran</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok_minimum</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
           @foreach($produk as $data)
            <tr>
                <td>{{ $data->kode_produk }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td>{{ $data->ukuran }}</td>
                <td>{{ $data->harga_beli }}</td>
                <td>{{ $data->harga_jual }}</td>
                <td>{{ $data->stok_minimum }}</td>
                <td>{{ $data->keterangan }}</td>
                <td>
                    <a href="{{url('/produk/edit/'.$data->kode_produk)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
            </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Ukuran</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok_minimum</th>
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
