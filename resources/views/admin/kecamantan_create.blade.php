@extends('template.admin')
@section('content-title')
    <i class="fa fa-map"></i> Wilayah
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="kecamatan">Wilayah</label>
                <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
                @error('kecamatan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="desa">Desa</label>
                <input type="text" name="desa" class="form-control" placeholder="Desa">
                @error('desa')
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
