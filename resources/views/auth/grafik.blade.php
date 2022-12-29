<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perikanan - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


</head>

<body class="bg-gradient-primary" style="background-image: url({{ asset('img/bg.png') }}); background-position: center;">

    @include('sweetalert::alert')


    @include('template.nav_home')


    <div class="container">

        <div class="row" >
            <div class="col-lg-12 mx-auto bg-white p-5 text-center rounded" style="margin-top: 100px; margin-left: -8rem; margin-bottom: 5rem;">
                <h1 class="text-center mb-5">Grafik Produksi</h1>
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
        </div>


    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

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



</body>

</html>
