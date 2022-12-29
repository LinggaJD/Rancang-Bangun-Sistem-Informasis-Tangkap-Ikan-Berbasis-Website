@extends('template.admin')
@section('content-title')
    <i class="fa fa-user-lock"></i> Ganti Password
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('user.pass.act',['user' => $user->id]) }}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" name="password" class="form-control" placeholder="Password Baru">
                @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                <input type="password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password Baru">
                @error('konfirmasi_password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-warning"> <i class="fa fa-user-lock"></i> Ganti Password</button>
        </form>
    </div>
</div>
@endsection
