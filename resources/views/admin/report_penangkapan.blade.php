<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perikanan - Dashboard</title>

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style type="text/css" media="print">
		@page {
			size: auto;
			/* auto is the initial value */
			margin: 0;
			/* this affects the margin in the printer settings */
		}

		* {
			font-family: 'Times New Roman', Times, serif;
		}

        .head {
			margin-top: -4rem;
		}

		.bord {
			border: solid 2px #222;
		}

        .logo {
			margin-top: 6rem;
		}

		.header {
			margin-top: -12rem;
			margin-left: 10rem;
		}
	</style>

</head>

<body onload="window.print()">

    <div class="container-fluid">
        <div class="row p-2">
			<div class="col-lg-12">
				<div class="row head">
					<div class="col-lg-4 float-left">

						<img src="{{ asset('img/surat/cilacap.png') }}" class="logo" width="150px" alt="">
					</div>
					<div class="col-lg-8 header float-right">
						<h4 class="text-center">PEMERINTAH KABUPATEN CILACAP</h4>
						<h4 class="text-center font-weight-bold">DINAS PERIKANAN</h4>
						<h5 class="text-center">Jalan Lingkar Selatan I, Telp/Fax. (0282)534178</h5>
						<h5 class="text-center">Website:http:/www.disperka.cilacapkab.go.id email:disperka@cilacapkab.go.id</h5>
						<h5 class="text-center font-weight-bold">CILACAP 53215</h5>
					</div>
				</div>
			</div>
        </div>

        <img src="{{ asset('img/surat/border.png') }}" width="100%" alt="">
    </div>

    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-lg-12">
                <h1 class="text-center">Data Penangkapan</h1>
                <p class="text-center">Dicetak tanggal : {{ date('d-m-Y') }}</p>
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Jenis Kapal</th>
                        <th>Alat Penangkap Ikan (API)</th>
                        <th>Nama Ikan</th>
                        <th>Jenis Perairan</th>
                        <th>Harga Satuan/KG</th>
                        <th>Produksi</th>
                        <th>Nilai</th>
                        <th>Enumrator</th>
                        <th>User</th>
                        <th>Waktu</th>
                    </tr>
                    @forelse ($penangkapan as $pk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pk->jenis_kapal }}</td>
                        <td>{{ $pk->alat_penangkap }}</td>
                        <td>{{ $pk->jenis_ikan }}</td>
                        <td>{{ $pk->jenis_perairan }}</td>
                        <td>{{ 'Rp.'.number_format($pk->jumlah_tangkapan,2,',','.') }}</td>
                        <td>{{ $pk->produksi }}</td>
                        <td>{{ 'Rp.'.number_format($pk->nilai,2,',','.') }}</td>
                        <td>{{ $pk->enumerator }}</td>
                        <td>{{ $pk->nama }}</td>
                        <td>{{ $pk->waktu }}</td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="11" class="text-center">Data tidak ada!</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>


</body>

</html>
