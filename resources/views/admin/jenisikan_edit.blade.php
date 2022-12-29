@extends('template.admin')
@section('content-title')
    <i class="fa fa-fish"></i> Jenis Ikan
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('jenis.ikan.update',['jenisikan' => $jenisikan->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="jenisikan">Jenis Ikan</label>
                <input type="text" name="jenisikan" class="form-control" placeholder="Jenis Ikan" value="{{ $jenisikan->jenis_ikan }}">
                @error('jenisikan')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kode_fao">Kode FAO</label>
                <input type="text" name="kode_fao" class="form-control" placeholder="Kode FAO" value="{{ $jenisikan->kode_fao }}">
                @error('kode_fao')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_perairan">Jenis Perairan</label>
                <input type="text" name="jenis_perairan" class="form-control" placeholder="Jenis Perairan" value="{{ $jenisikan->kode_fao }}">
                @error('jenis_perairan')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hias">Hias</label>
                <input type="text" name="hias" class="form-control" placeholder="Hias" value="{{ $jenisikan->hias }}">
                @error('hias')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kelompok">Kelompok</label>
                <input type="text" name="kelompok" class="form-control" placeholder="Kelompok" value="{{ $jenisikan->kelompok }}">
                @error('kelompok')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kelompok_besar">Kelompok Besar</label>
                <input type="text" name="kelompok_besar" class="form-control" placeholder="Kelompok Besar" value="{{ $jenisikan->kelompok_besar }}">
                @error('kelompok_besar')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-info"> <i class="fa fa-edit"></i> Edit</button>
        </form>
    </div>
</div>
@endsection
