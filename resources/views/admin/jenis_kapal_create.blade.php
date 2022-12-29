@extends('template.admin')
@section('content-title')
    <i class="fa fa-ship"></i> Jenis Kapal
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="jeniskapal">Jenis Kapal</label>
                <input type="text" name="jeniskapal" class="form-control" placeholder="Jenis Kapal">
                @error('jeniskapal')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi_kapal">Deskripsi Kapal</label>
                <textarea name="deskripsi_kapal" class="form-control" placeholder="Deskripsi Kapal"></textarea>
                @error('deskripsi_kapal')
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
