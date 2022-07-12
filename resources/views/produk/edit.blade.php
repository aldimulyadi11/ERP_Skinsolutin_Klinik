@extends('layouts.index')

@section('content')
<!-- Exportable Table -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-default">      
      
      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Update Data Produk</h4>
              </div>
              @foreach($produk as $data)
              <form role="form" action="{{url("/produk/update")}}" method="post">
                      {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" value="{{ $data->kode_produk }}" class="form-control"  name="kode_produk">
                </div>

                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" value="{{ $data->nama_produk }}" class="form-control"  name="nama_produk">
                </div>

                <div class="form-group">
                  <label>Ukuran (ml)</label>
                  <input type="number" class="form-control" value="{{ $data->ukuran }}" name="ukuran_produk">
                </div>

                <div class="form-group">
                  <label>Harga Beli</label>
                  <input type="number" class="form-control" value="{{ $data->harga_beli }}" name="harga_beli">
                </div>

                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="number" value="{{ $data->harga_jual }}" class="form-control" name="harga_jual">
                </div>

                <div class="form-group">
                  <label>Stok Minimum</label>
                  <input type="number" value="{{ $data->stok_minimum }}" class="form-control" name="stok_minimum">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" rows="3"  name="keterangan">{{ $data->keterangan }}</textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="modal-footer">
                <a href="{{url("dataProduk")}}" class="btn btn-warning pull-left">Cancel</a>
                
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