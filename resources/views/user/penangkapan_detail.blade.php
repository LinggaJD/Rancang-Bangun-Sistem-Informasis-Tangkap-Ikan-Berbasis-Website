@extends('template.user')
@section('content-title')
    <i class="fa fa-toolbox"></i> Penangkapan
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="table-responsive">

            <table class="table table-hover">
                <tr>
                    <th>Waktu</th>
                    <td>:</td>
                    <td>{{ $penangkapan->waktu }}</td>
                </tr>
                <tr>
                    <th>Jenis Kapal</th>
                    <td>:</td>
                    <td>{{ $penangkapan->jenis_kapal }}</td>
                </tr>
                <tr>
                    <th>Deskripsi Kapal</th>
                    <td>:</td>
                    <td>{{ $penangkapan->deskripsi_kapal }}</td>
                </tr>
                <tr>
                    <th>Alat Penangkap Ikan (API</th>
                    <td>:</td>
                    <td>{{ $penangkapan->alat_penangkap }}</td>
                </tr>
                <tr>
                    <th>Deskripsi Kelompok Alat Penangkap</th>
                    <td>:</td>
                    <td>{{ $penangkapan->jenis_alat_penangkap_kelompok }}</td>
                </tr>
                <tr>
                    <th>Nama Ikan</th>
                    <td>:</td>
                    <td>{{ $penangkapan->jenis_ikan }}</td>
                </tr>
                <tr>
                    <th>Kode FAO</th>
                    <td>:</td>
                    <td>{{ $penangkapan->kode_fao }}</td>
                </tr>
                <tr>
                    <th>Deskripsi Jenis Perairan</th>
                    <td>:</td>
                    <td>{{ $penangkapan->jenis_perairan }}</td>
                </tr>
                <tr>
                    <th>Hias</th>
                    <td>:</td>
                    <td>{{ $penangkapan->hias }}</td>
                </tr>
                <tr>
                    <th>Kelompok</th>
                    <td>:</td>
                    <td>{{ $penangkapan->kelompok }}</td>
                </tr>
                <tr>
                    <th>Kelompok Besar</th>
                    <td>:</td>
                    <td>{{ $penangkapan->kelompok_besar }}</td>
                </tr>


                <tr>
                    <th>Nilai Harga Satuan / Kg</th>
                    <td>:</td>
                    <td>{{ 'Rp ' . number_format($penangkapan->jumlah_tangkapan,2,',','.') }}</td>
                </tr>

                <tr>
                    <th>Produksi</th>
                    <td>:</td>
                    <td>{{ $penangkapan->produksi. ' Kg' }}</td>
                </tr>
                <tr>
                    <th>Nilai</th>
                    <td>:</td>
                    <td>{{ 'Rp ' . number_format($penangkapan->nilai,2,',','.') }}</td>
                </tr>

            </table>
        </div>
    </div>
</div>
@endsection
