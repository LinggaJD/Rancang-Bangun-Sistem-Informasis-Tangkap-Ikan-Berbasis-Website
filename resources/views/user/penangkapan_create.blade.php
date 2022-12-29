@extends('template.user')
@section('content-title')
    <i class="fa fa-toolbox"></i> Penangkapan
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="jenis_alat_penangkap">Jenis Alat Tangkap</label>
                <select name="jenis_alat_penangkap" class="form-control jenis_alat_penangkap">
                    <option value=""></option>
                    @foreach ($jenis_alat_penangkap as $jap)

                    <option value="{{ $jap->id }}" {{ (old('jenis_alat_penangkap') == $jap->id) ? 'selected' : '' }}>{{ $jap->alat_penangkap }}</option>
                    @endforeach
                </select>
                @error('jenis_alat_penangkap')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenisikan">Jenis Ikan</label>
                <select name="jenisikan" class="form-control jenisikan">
                    <option value=""></option>
                    @foreach ($jenisikan as $jk)

                    <option value="{{ $jk->id }}" {{ (old('jenisikan') == $jk->id) ? 'selected' : '' }}>{{ $jk->jenis_ikan }}</option>
                    @endforeach
                </select>
                @error('jenisikan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jeniskapal">Jenis Kapal</label>
                <select name="jeniskapal" class="form-control jeniskapal">
                    <option value=""></option>
                    @foreach ($jeniskapal as $jkl)

                    <option value="{{ $jkl->id }}" {{ (old('jeniskapal') == $jkl->id) ? 'selected' : '' }}>{{ $jkl->jenis_kapal }}</option>
                    @endforeach
                </select>
                @error('jeniskapal')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="nilai">Nilai Harga Satuan / Kg</label>
                <input type="number" name="nilai" class="form-control" placeholder="Nilai Harga Satuan / Kg">
                @error('nilai')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="produksi">Produksi</label>
                <input type="number" name="produksi" step="any" class="form-control" placeholder="Produksi (Kg.)">
                @error('produksi')
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
