@extends('template.user')
@section('content-title')
    <i class="fas fa-flag"></i> Laporan
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('account.laporan.update',['id' => $laporan->id]) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="laporan">Laporan</label>
                <textarea name="laporan" class="form-control" placeholder="laporan">{{ $laporan->laporan }}</textarea>
                @error('laporan')
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
