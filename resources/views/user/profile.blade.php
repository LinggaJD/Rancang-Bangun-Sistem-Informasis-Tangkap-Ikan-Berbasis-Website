@extends('template.user')
@section('content-title')
<i class="fa fa-id-badge"></i> Profile
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">

            <div class="row">

                <div class="col-lg-4">
                    <img src="{{ asset($user->foto) }}" style="width: 300px; height: 300px" class="mt-5 rounded-circle img-thumbnail" alt="">
                </div>
                <div class="col-lg-8">

                    <div class="text-right mt-3 mb-3">


                        <a href="{{ route('account.profile.pass') }}" class="btn btn-warning mb-2"><i class="fa fa-user-lock"></i> Ganti Password</a>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <tr>
                                <th>NIP</th>
                                <td>:</td>
                                <td>{{ $user->nip }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Telp</th>
                                <td>:</td>
                                <td>{{ $user->telp }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Wilayah Kerja</th>
                                <td>:</td>
                                <td>{{ $user->kecamatan.", ".$user->desa }}</td>
                            </tr>
                            <tr>
                                <th>Enumerator</th>
                                <td>:</td>
                                <td>{{ $user->enumerator }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
