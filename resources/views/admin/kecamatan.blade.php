@extends('template.admin')
@section('content-title')
    <i class="fa fa-map"></i> Wilayah
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{ route('kecamatan.create') }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Tambah</a>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>Wilayah/Kecamatan</th>
                        <th>Kelurahan/Desa</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($kecamatan as $kc)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kc->kecamatan }}</td>
                        <td>{{ $kc->desa }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('kecamatan.edit',['kecamatan' => $kc->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('kecamatan.destroy',['kecamatan' => $kc->id]) }}" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
                            </div>
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
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
</script>
@endsection
