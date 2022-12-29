@extends('template.admin')
@section('content-title')
<i class="fa fa-flag"></i> Laporan
@endsection
@section('content')

<div class="row mt-2">
    <div class="col-lg-12">
        <a href="{{ route('laporan.export') }}" class="btn btn-success mb-2"> <i class="fa fa-file-excel"></i> Export</a>
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
                        <th>Laporan User</th>
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

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center d-block mx-auto bg-secondary text-white p-3 mb-5"
                    style="width:  500px !important; border-radius: 50px !important;">Pengumuman</h1>

                <a href="" class="btn btn-info mb-2" data-toggle="modal" data-target="#editPengumuman">Edit
                    Pengumuman</a>

                <div class="modal fade" id="editPengumuman" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Pengumuman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('pengumuman.edit') }}" method="post">
                                @csrf
                                <input type="hidden" name="pengumuman_id" value="{{ $pengumuman->id }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <textarea name="pengumuman" class="form-control" rows="20" placeholder="Pengumuman">{{ $pengumuman->isi }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="content p-3 bg-secondary text-white rounded" style="font-size: 20px;">
                    {{ $pengumuman->isi }}
                </div>
            </div>
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
