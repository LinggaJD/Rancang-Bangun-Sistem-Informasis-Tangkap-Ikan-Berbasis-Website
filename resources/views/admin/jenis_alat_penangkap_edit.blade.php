@extends('template.admin')
@section('content-title')
    <i class="fa fa-toolbox"></i> Jenis Alat Penangkap
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('jenis.alat.penangkap.update',['jenis_alat_penangkap' => $jenis_alat_penangkap->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="alat_penangkap">Alat Penangkap</label>
                <input type="text" name="alat_penangkap" class="form-control" placeholder="Alat Penangkap" value="{{ $jenis_alat_penangkap->alat_penangkap }}">
                @error('alat_penangkap')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kelompok">Kelompok</label>
                <input type="text" name="kelompok" class="form-control" placeholder="Kelompok" value="{{ $jenis_alat_penangkap->kelompok }}">
                @error('kelompok')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
        </form>
    </div>
</div>
@endsection
