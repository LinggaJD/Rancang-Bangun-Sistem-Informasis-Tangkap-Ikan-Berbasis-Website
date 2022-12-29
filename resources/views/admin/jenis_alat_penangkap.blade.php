@extends('template.admin')
@section('content-title')
    <i class="fa fa-toolbox"></i> Jenis Alat Penangkap
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{ route('jenis.alat.penangkap.create') }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Tambah</a>

        <a href="{{ route('jenis.alat.penangkap.export') }}" class="btn btn-success"> <i class="fa fa-file-excel"></i> Export</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#importModal">
            <i class="fa fa-file-excel"></i> Import
        </button>

        <!-- Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-file-excel"></i> Import</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('alat.penangkap.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="file" class="form-control">

                            @error('file')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('alat.penangkap.form') }}" class="text-success">Unduh Formulir</a>
                        </div>
                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success">Import</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Alat Penangkap</th>
                        <th>Kelompok</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($jenis_alat_penangkap as $jp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jp->alat_penangkap }}</td>
                        <td>{{ $jp->kelompok }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('jenis.alat.penangkap.edit',['jenis_alat_penangkap' => $jp->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('jenis.alat.penangkap.destroy',['jenis_alat_penangkap' => $jp->id]) }}" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
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
@if (Session::get('error_add'))
<script>
    $('#importModal').modal('show');
</script>
@endif
@endsection
