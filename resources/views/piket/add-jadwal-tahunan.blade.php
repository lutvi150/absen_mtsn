@extends('layout.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $title }}
                <small>{{ $title }}</small>
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
                            <h3 class="box-title">{{ $title }}</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <button class="btn btn-success btn-sm" onclick="showModalAdd()"><i class="fa fa-plus"></i>
                                Tambah</button>
                            <button class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Generate Piket
                                Tahunan</button>
                            <table id="" class="table ">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Hari</th>
                                        <th>Piket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Helpers\HariHelper::getAllHari() as $nomor => $hari)
                                        <tr>
                                            <td style="width: 5%">{{ $nomor }}</td>

                                            <td>
                                                <label class="label label-success">
                                                    {{ $hari }}
                                                </label>
                                            </td>

                                            <td>
                                                <ul id="hari-{{ $nomor }}">
                                                </ul>
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

    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-add-title">Modal title</h5>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="form-add" action="" method="POST">
                        <div class="mb-3">
                            <label for="hari_piket" class="form-label">Hari Piket</label>
                            <select name="hari_piket" class="form-control" id="hari_piket">
                                <option value="">-- Pilih Hari --</option>
                                @foreach (\App\Helpers\HariHelper::getAllHari() as $nomor => $hari)
                                    <option value="{{ $nomor }}">{{ $hari }}</option>
                                @endforeach
                            </select>
                            <span class="e-hari_piket text-error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="id_guru" class="form-label">Nama Guru</label>
                            <select name="id_guru" class="form-control" id="id_guru">

                            </select>
                            <span class="e-nama_guru text-error"></span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" onclick="store_data()" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            showDataPiket();
        });
        data_guru = (callback) => {
            $.ajax({
                type: "GET",
                url: "{{ url('api/guru') }}",
                dataType: "JSON",
                success: function(response) {
                    if (response.status) {
                        let html = '<option value="">-- Pilih Guru --</option>';
                        $.each(response.data, function(i, v) {
                            html += `<option value="${v.id}">${v.nama_guru}</option>`;
                        });
                        $("#id_guru").html(html);
                        if (typeof callback === "function") {
                            callback();
                        }
                    } else {
                        alert('Gagal mengambil data guru.');
                    }
                },
                error: function(xhr) {
                    error_function(xhr);
                }
            });
        }

        showModalAdd = () => {
            sessionStorage.setItem('TY', 'POST');
            $("#form-add")[0].reset();
            $("#form-add").attr('action', `{{ url('api/jadwal-tahunan') }}`);
            $('.text-error').text('');
            data_guru(() => {
                $('.modal-add-title').text('Tambah ');
                $('#modal-add').modal('show');
            });
        }

        edit_data = (id) => {
            sessionStorage.setItem('TY', 'PUT');
            $("#form-add")[0].reset();
            $("#form-add").attr('action', `${BASE_URL}/api/kelas/${id}`, );
            data_guru(() => {
                $.ajax({
                    type: "GET",
                    url: `${BASE_URL}/api/kelas/${id}`,
                    dataType: "JSON",
                    success: function(response) {
                        $('#nama_kelas').val(response.data.nama_kelas);
                        $('#id_guru').val(response.data.id_guru);
                        sessionStorage.setItem('id_guru', response.data.id_guru);
                        $('.modal-add-title').text('Edit Kelas');
                        $('#modal-add').modal('show');
                    },
                    error: function(xhr) {
                        error_function(xhr)
                    }
                });
            });

        }
        store_data = () => {
            $(".text-error").text('');
            let hari = $("#hari_piket").val();
            let id_guru = $("#id_guru").val();
            if (hari == '' || id_guru == '') {
                if (hari == '') {
                    $(".e-hari_piket").text('Hari Piket harus diisi');
                }
                if (id_guru == '') {
                    $(".e-nama_guru").text('Nama Guru harus diisi');
                }
                Notiflix.Report.failure(
                    `Kesalahan`,
                    `Data Gagal Disimpan, pastikan semua field terisi dengan benar`,
                    `Okay`,
                );
                return;
            }
            let dataPiket = JSON.parse(localStorage.getItem('data_piket')) || [];
            let duplicate = dataPiket.find(item =>
                item.hari == hari && item.id_guru == id_guru
            );
            if (duplicate) {

                Notiflix.Report.failure(
                    `Duplikat`,
                    `Guru pada hari tersebut sudah ditambahkan`,
                    `Okay`,
                );

                return;
            }
            let dataBaru = {
                hari: hari,
                id_guru: id_guru
            };
            dataPiket.push(dataBaru);
            localStorage.setItem('data_piket', JSON.stringify(dataPiket));
            Notiflix.Report.success(
                `Berhasil`,
                `Data berhasil disimpan`,
                `Okay`,
            );
            console.log(dataPiket);
        }
        showDataPiket = () => {
            let dataPiket = JSON.parse(localStorage.getItem('data_piket')) || [];
            $("ul[id^='hari-']").html('');

            dataPiket.forEach(item => {
                let hariId = item.hari;
                let guruId = item.id_guru;
                console.log(guruId);
                
                let namaGuru = $("#id_guru option[value='" + guruId + "']").text();
                $("#hari-" + hariId).append(`
            <li>${namaGuru}</li>
        `);

            });

        }
        delete_data = (id) => {
            Notiflix.Confirm.show(
                'Konfirmasi Hapus',
                'Apakah Anda yakin ingin menghapus data ini?',
                'Ya',
                'Tidak',
                function() {
                    $.ajax({
                        type: "GET",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `{{ url('admin/kelas/kelas-delete/${id}') }}`,
                        success: function(response) {
                            if (response.status == true) {
                                Notiflix.Report.success(
                                    `Berhasil`,
                                    `Data Kelas Berhasil Dihapus`,
                                    `Okay`,
                                );
                                location.reload();
                            } else {
                                Notiflix.Report.failure(
                                    `Gagal`,
                                    `Data Kelas Gagal Dihapus`,
                                    `Okay`,
                                );
                            }
                        },
                        error: function(xhr) {
                            Notiflix.Report.failure(
                                `Kesalahan`,
                                `Terjadi kesalahan saat menghapus data`,
                                `Okay`,
                            );
                        }
                    });
                },
                function() {
                    // User clicked "No"
                    Notiflix.Notify.info('Penghapusan dibatalkan.');
                }
            );
        }
    </script>
@endsection
