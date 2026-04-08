@extends('layout.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $siswa }}</h3>
                            <p>Jumlah Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Lebih Lanjut <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $guru }}</h3>
                            <p>Jumlah Guru</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Lebih Lanjut <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $kelas }}</h3>
                            <p>Jumlah Kelas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Lebih Lanjut <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

            </div><!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-envelope"></i>
                            <h3 class="box-title">Halaman Utama</h3>

                        </div>
                        <div class="box-body text-center">
                            <h1>
                                Selamat Datang Di {{ env('APP_NAME') }}
                            </h1>
                        </div>
                        <div class="box-footer clearfix">
                        </div>
                    </div>
                </section>
                <!-- /.Left col -->
                <section class="col-lg-6 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-users"></i>
                            <h3 class="box-title">Grafik Siswa Kelas</h3>

                        </div>
                        <div class="box-body">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="box-footer clearfix">
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function () {
            get_data_chart_siswa();
        });
        get_data_chart_siswa=()=>{
            $.ajax({
                type: "GET",
                url: `${BASE_URL}/api/dashboard/chart-siswa`,
                dataType: "JSON",
                success: function (response) {
                    siswa_chart(response);
                }
            });
        }
        siswa_chart = (response) => {
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.dataKelas,
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: response.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
@endsection
