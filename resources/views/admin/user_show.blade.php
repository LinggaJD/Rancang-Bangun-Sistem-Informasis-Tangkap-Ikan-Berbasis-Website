@extends('template.admin')
@section('content-title')
    <i class="fa fa-users"></i> Detail User
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover">
                            <tr>
                                <td colspan="3" class="text-center">
                                    <img src="{{ asset($user->foto) }}" width="500px" class="img-fluid img-thumbnail" alt="">
                                </td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>:</td>
                                <td>
                                    {{ $user->nip }}
                                </td>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>
                                    {{ $user->nama }}
                                </td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>
                                    {{ $user->username }}
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>
                                    {{ $user->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>Telp</th>
                                <td>:</td>
                                <td>
                                    {{ $user->telp }}
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>
                                    {{ $user->alamat }}
                                </td>
                            </tr>
                            <tr>
                                <th>Wilayah Kerja</th>
                                <td>:</td>
                                <td>
                                    {{ $user->kecamatan.", ".$user->desa }}
                                </td>
                            </tr>
                            <tr>
                                <th>Enumerator</th>
                                <td>:</td>
                                <td>{{ ($user->enumerator === null) ? '-' : $user->enumerator }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>:</td>
                                <td>
                                    {!! html_entity_decode(($user->role == 'admin') ? '<div class="badge badge-primary">Admin</div>' : '<div class="badge badge-warning">User</div>') !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
