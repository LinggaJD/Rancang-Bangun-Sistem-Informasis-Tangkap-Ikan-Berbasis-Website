@extends('template.admin')
@section('content-title')
    <i class="fa fa-toolbox"></i> Jenis Alat Penangkap
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="alat_penangkap">Alat Penangkap</label>
                <input type="text" name="alat_penangkap" class="form-control" placeholder="Alat Penangkap">
                @error('alat_penangkap')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kelompok">Kelompok</label>
                <input type="text" name="kelompok" class="form-control" placeholder="Kelompok">
                @error('kelompok')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Tambah</button>
        </form>
    </div>
</div>
@endsection
