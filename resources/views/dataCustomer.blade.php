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
        <h3 class="box-title">Add Data Customer</h3>
      </div>

      <div class="box-body">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> 
                Add Customer
        </button>
      </div>
       <!-- /.box-header -->
       <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Data Customer</h4>
              </div>

              <form role="form" action="{{url("/customer/store")}}" method="post">
                      {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama customer</label>
                  <input type="text" class="form-control"  name="nama_customer" required>
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
                    <label>Status</label><br>
                    <input type="radio" value="Member" name="status_customer" id="radio_1" class="flat-red">
                    <label for="radio_1">Member</label>
                    <input type="radio" value="Non Member" name="status_customer" id="radio_2" class="flat-red"> 
                    <label for="radio_2">Non Member</label>
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
                <th>Kode Customer</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
           @foreach($customer as $data)
            <tr>
                <td>{{ $data->kode_customer }}</td>
                <td>{{ $data->nama_customer }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->no_telp }}</td>
                <td>{{ $data->tgl_lahir }}</td>
                <td>{{ $data->status }}</td>
                <td>
                    <a href="{{('/customer/edit/'.$data->kode_customer)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>

                    <a class="btn btn-danger" onclick="hapusCustomer({{$data->kode_customer}})"><i class="fa fa-trash-o"></i></a>
            </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
                <th>Kode Customer</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection