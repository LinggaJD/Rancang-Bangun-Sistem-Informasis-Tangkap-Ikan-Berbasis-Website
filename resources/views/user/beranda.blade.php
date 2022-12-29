@extends('template.user')
@section('header-content')
@php
$pengumuman = DB::table('pengumuman')->first();
@endphp

<div class="row mb-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center d-block mx-auto bg-secondary text-white p-3 mb-5"
                    style="width:  500px !important; border-radius: 50px !important;">Pengumuman
                </h1>
                <div class="content p-3 bg-secondary text-white rounded" style="font-size: 20px;">
                    {{ $pengumuman->isi }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content-title')
<i class="fa fa-tachometer-alt"></i>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <canvas id="chart-ikan"></canvas>
        </div>

        <div class="col-lg-12 mb-4">
            <canvas id="chart-alat"></canvas>
        </div>

        <div class="col-lg-12 mb-4">
            <canvas id="chart-wilayah"></canvas>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script>
    $(function () {
        var cData = JSON.parse(`<?php echo $chart_ikan; ?>`);
        var cData2 = JSON.parse(`<?php echo $chart_alat; ?>`);
        var cData3 = JSON.parse(`<?php echo $chart_wilayah; ?>`);
        var ctx = $("#chart-ikan");
        var ctx2 = $("#chart-alat");
        var ctx3 = $("#chart-wilayah");




        var data = {
                labels: cData.label,
                datasets: [{
                    label: "Harga / Kg Ikan",
                    data: cData.data,

                    backgroundColor: [
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)'
                    ],
                    borderColor: [
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)'
                    ],
                    borderWidth: [1, 1, 1, 1, 1, 1, 1]
                }]
            };

            var data2 = {
                labels: cData2.label,
                datasets: [{
                    label: "Jumlah Alat",
                    data: cData2.data,

                    backgroundColor: [
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)'
                    ],
                    borderColor: [
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)'
                    ],
                    borderWidth: [1, 1, 1, 1, 1, 1, 1]
                }]
            };

            var data3 = {
                labels: cData3.label,
                datasets: [{
                    label: "Jumlah Wilayah",
                    data: cData3.data,

                    backgroundColor: [
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)'
                    ],
                    borderColor: [
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(220,20,60, 1)',
                        'rgba(255,69,0, 1)',
                        'rgba(0,128,0,1)',
                        'rgba(0,0,205,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)',
                        'rgba(255,20,147,1)',
                        'rgba(0,0,128,1)'
                    ],
                    borderWidth: [1, 1, 1, 1, 1, 1, 1]
                }]
            };


            //options
            var options = {
                responsive: true,
                 
                title: {
                    display: true,
                    position: "top",
                    text: "Produksi Penangkapan Laut {{ $year }}",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                },
                tooltips: {
                  callbacks: {
                    label: function (tooltipItem, data) {
                      return (
                        "Rp " + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                      );
                    },
                  },
                },
                 
            };

            var options2 = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Volume Produksi Hasil Laut Menurut Kelompok API {{ $year }}",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                },
                tooltips: {
                  callbacks: {
                    label: function (tooltipItem, data) {
                      return (
                        tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                      );
                    },
                  },
                },
            };

            var options3 = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Volume Produksi Hasil Laut Menurut Kelompok TPI / Wilayah Pendaratan Ikan {{ $year }}",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                },
                tooltips: {
                  callbacks: {
                    label: function (tooltipItem, data) {
                      return (
                        tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                      );
                    },
                  },
                },
            };

            //create Pie Chart class object
            var chart1 = new Chart(ctx, {
                type: "bar",
                data: data,
                options: options
            });

            var chart2 = new Chart(ctx2, {
                type: "bar",
                data: data2,
                options: options2
            });

            var chart3 = new Chart(ctx3, {
                type: "bar",
                data: data3,
                options: options3
            });





    });
</script>
@endsection
