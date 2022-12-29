@extends('template.user')
@section('content-title')
<i class="fa fa-flag"></i> Laporan
@endsection
@section('content')

<div class="row mt-2">
    <div class="col-lg-12">
        <a href="{{ route('account.laporan.create') }}" class="btn btn-primary mb-2"><i class="fa fa-pencil-alt"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Wilayah</th>
                        <th>Waktu</th>
                        <th>Laporan</th>
                        <td><i class="fa fa-cogs"></i></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $lp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset($lp->foto) }}" width="100px" alt="">
                        </td>
                        <td>{{ $lp->nama }}</td>
                        <td>{{ $lp->email }}</td>
                        <td>{{ $lp->username }}</td>
                        <td>{{ $lp->kecamatan }}</td>
                        <td>{{ $lp->laporan_waktu }}</td>
                        <td>{{ $lp->laporan }}</td>
                        <td>
                            <a href="{{ route('account.laporan.edit',['id' => $lp->laporan_id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('account.laporan.destroy',['id' => $lp->laporan_id]) }}" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('script')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#dataTable").DataTable();
    });
</script>
@endsection
