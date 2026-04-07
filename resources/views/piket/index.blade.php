@extends('layout.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data {{ $title }}
                <small>Data {{ $title }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Data</a></li>
                <li class="active">{{ $title }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Piket</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <table id="example1" hidden class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>BULAN PIKET</th>
                                        <th style="width: 40px">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bulan as $key =>$item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item }}</td>
                                            <td style="width:40px">
                                                <a href="{{ route('piket.show', ['bulan' => $key, 'tahun' => date('Y')]) }}" class="btn btn-info btn-sm"><i
                                                        class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>
@endsection
@section('css')
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
@endsection
@section('script')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.js') }}"></script>
    <script>
        $(function() {
            // $("#example1").DataTable();
        });
    </script>
@endsection
