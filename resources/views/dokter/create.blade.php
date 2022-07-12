@extends('layouts.klinik')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Gaji Karyawan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('Sistem_Penggajian.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Karyawan</label>
                            <div class="col-md-6">
                                <select class="form-control" name="employee_id">
                                    @foreach ($employee as $employees)
                                        <option value="{{ $employees->id }}">{{ $employees->firstname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-4 control-label">Gaji Karyawan</label>
                            <div class="col-md-6">
                                <input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') }}" required>
                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Membuat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
