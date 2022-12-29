@extends('template.admin')
@section('content-title')
    <i class="fa fa-toolbox"></i> Penangkapan
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{ route('penangkapan.export') }}" class="btn btn-success"><i class="fa fa-file-excel"></i> Export Excel</a>
        <a href="{{ route('penangkapan.report') }}" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf"></i> Report Semua Data</a>
        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#range"><i class="fa fa-file-pdf"></i> Report Berdasarkan Tanggal</a>

    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="row input-daterange">
            <div class="col-md-5 mb-2">
                <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Dari Tanggal" readonly />
            </div>
            <div class="col-md-5 mb-2">
                <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Ke Tanggal" readonly />
            </div>
            <div class="col-md-2 text-center">
                <button type="button" name="filter" id="filter" class="btn btn-secondary"><i class="fa fa-filter"></i> Filter</button>
                <button type="button" name="refresh" id="refresh" class="btn btn-default"><i class="fas fa-sync-alt"></i> Refresh</button>
            </div>
        </div>
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
                            <th>Alat Penangkap Ikan (API)</th>
                            <th>Nama Ikan</th>
                            <th>Jenis Perairan</th>
                            <th>Harga Satuan / Kg</th>
                            <th>Produksi</th>
                            <th>Nilai</th>
                            <th>Waktu</th>
                            <th>Enumerator</th>
                            <th>User</th>

                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Range --}}
<div class="modal fade" id="range" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">Input Rentang Tanggal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form target="_blank" action="{{ route('penangkapan.report.range') }}" method="GET">
        @method('GET')
        @csrf
        <div class="modal-body">
            <label>Dari Tanggal</label>
            <input type="date" class="form-control" name="from_date">
            <label>Ke Tanggal</label>
            <input type="date" class="form-control" name="to_date">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/dataRender/datetime.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
        });

        load_data();

        function load_data(from_date = '', to_date = '') {

            $('.penangkapan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('penangkapan') }}",
                    data:{
                        from_date: from_date,
                        to_date: to_date
                    }
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: "text-center"
                    },
                    {
                        data: 'jenis_kapal',
                        name: 'jenis_kapal',
                        className: "text-center"
                    },
                    {
                        data: 'alat_penangkap',
                        name: 'alat_penangkap',
                        className: "text-center"
                    },
                    {
                        data: 'jenis_ikan',
                        name: 'jenis_ikan',
                        className: "text-center"
                    },
                    {
                        data: 'jenis_perairan',
                        name: 'jenis_perairan',
                        className: "text-center"
                    },
                    {
                        data: 'jumlah_tangkapan',
                        name: 'jumlah_tangkapan',
                        render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp ' ),
                        className: "text-center"
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
                        data: 'waktu',
                        name: 'waktu',
                        className: "text-center"
                    },

                    {
                        data: 'enumerator',
                        name: 'enumerator',
                        className: "text-center"
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        className: "text-center"
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
        }

        $('#filter').click(function(){
            let from_date = $('#from_date').val();
            let to_date = $('#to_date').val();
            if(from_date != '' &&  to_date != ''){
                $('.penangkapan').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Kedua Tanggal tidak boleh kosong!',
                });
            }
        });

        $('#refresh').click(function(){
            $('#from_date').val('');
            $('#to_date').val('');
            $('.penangkapan').DataTable().destroy();
            load_data();
        });
    });
</script>
@endsection
