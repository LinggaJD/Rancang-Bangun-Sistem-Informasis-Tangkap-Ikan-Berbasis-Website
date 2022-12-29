@extends('template.admin')
@section('content-title')
<i class="fa fa-users"></i>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">

            <form action="{{ route('user.update',['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control" placeholder="NIP" value="{{ $user->nip }}">
                    @error('nip')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $user->nama }}">
                    @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}">
                    @error('username')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="tel" name="telp" class="form-control" placeholder="Telp" value="{{ $user->telp }}">
                    @error('telp')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat">{{ $user->alamat }}</textarea>
                    @error('alamat')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <br>
                    <img id="img-preview" width="200px" class="img-thumbnail mb-2" src="{{ asset($user->foto) }}" alt="">

                    <input type="file" class="form-control" id="form-file" name="foto">
                    @error('foto')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="wilayah_kerja">Wilayah Kerja</label>
                    <select name="wilayah_kerja" class="form-control kecamatan">
                        <option value=""></option>
                        @foreach ($kecamatan as $wl)

                        <option value="{{ $wl->id }}" {{ ($wl->id == $wilayah_kerja->kecamatan_id) ? 'selected' : '' }}>{{ $wl->kecamatan }}</option>
                        @endforeach
                    </select>
                    @error('wilayah_kerja')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control">
                        <option value=""></option>
                        @foreach ($role as $rl)

                        <option value="{{ $rl->id }}" {{ ($rl->id == $role_user->role_id) ? 'selected' : '' }}>{{ $rl->role }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="enumerator">Enumerator</label>
                    <select name="enumerator" class="form-control enumerator">
                        <option value=""></option>
                        @foreach ($enumerator as $jk)

                        <option value="{{ $jk->id }}" {{ ($enumerator_user->enumerator_id == $jk->id) ? 'selected' : '' }}>{{ $jk->enumerator }}</option>
                        @endforeach
                    </select>
                    @error('enumerator')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
            </form>
        </div>
    </div>
@endsection
