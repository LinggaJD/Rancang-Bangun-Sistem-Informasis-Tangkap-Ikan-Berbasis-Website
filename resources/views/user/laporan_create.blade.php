@extends('template.user')
@section('content-title')
    <i class="fas fa-flag"></i> Laporan
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('account.laporan.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="laporan">Laporan</label>
                <textarea name="laporan" class="form-control" placeholder="laporan"></textarea>
                @error('laporan')
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
