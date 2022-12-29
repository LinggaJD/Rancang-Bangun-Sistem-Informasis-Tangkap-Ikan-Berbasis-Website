@extends('template.user')
@section('content-title')
    <i class="fa fa-toolbox"></i> Produksi Tangkap Ikan
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{ route('account.penangkapan.create') }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Tambah</a>

    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table>
                <table class="table table-bordered penangkapan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Kapal</th>
                            <th>Alat Penangkap (API)</th>
                            <th>Nama Ikan</th>
                            <th>Nilai Harga Satuan / Kg</th>
                            <th>Produksi</th>
                            <th>Nilai</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.penangkapan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('account.penangkapan') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: "text-center"
                },
                {
                    data: 'jenis_kapal',
                    name: 'jenis_kapal'
                },
                {
                    data: 'alat_penangkap',
                    name: 'alat_penangkap'
                },
                {
                    data: 'jenis_ikan',
                    name: 'jenis_ikan'
                },
                {
                    data: 'jumlah_tangkapan',
                    name: 'jumlah_tangkapan',
                    render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp ' ),
                },
                {
                    data: 'produksi',
                    name: 'produksi',
                    render: function(data) {
                        return data + ' Kg';
                    }
                },
                {
                    data: 'nilai',
                    name: 'nilai',
                    render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp ' ),
                },
                {
                    data: 'action',
                    name: 'action',
                    className : "text-center",
                    orderable: true,
                    searchable: true
                },
            ]
        });
    });
</script>
@endsection
