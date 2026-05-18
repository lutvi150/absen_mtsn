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
                                            {{-- Nomor --}}
                                            <td class="text-center align-middle" style="width: 5%">
                                                {{ $nomor }}
                                            </td>

                                            {{-- Nama Hari --}}
                                            <td class="align-middle" style="width: 20%">
                                                <span class="badge badge-success px-3 py-2">
                                                    {{ $hari }}
                                                </span>
                                            </td>

                                            {{-- Data Guru --}}
                                            <td>
                                                <table class="table table-sm table-borderless mb-0">
                                                    <tbody id="hari-{{ strtolower($hari) }}">
                                                        <tr>
                                                            <td class="align-middle">
                                                                Budi
                                                            </td>

                                                            <td class="text-end" style="width: 1%">
                                                                <button type="button" class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                            <span class="e-hari text-error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="id_guru" class="form-label">Nama Guru</label>
                            <select name="id_guru" class="form-control" id="id_guru">

                            </select>
                            <span class="e-id_guru text-error"></span>
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
            $("#form-add").attr('action', `{{ url('api/piket-tahunan') }}`);
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
            let formData =
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: $("#form-add").attr('action'),
                    data: {
                        hari: $("#hari_piket").children("option:selected").val(),
                        id_guru: $("#id_guru").children("option:selected").val(),
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status == true) {
                            Notiflix.Report.success(
                                `Berhasil`,
                                `Data Piket Tahunan Berhasil Disimpan`,
                                `Okay`,
                            );
                            $('#modal-add').modal('hide');
                            // location.reload();
                        } else {

                            $.each(response.errors, function(key, value) {
                                $(`.e-${key}`).text(value[0]);
                            });
                            Notiflix.Report.failure(
                                `Kesalahan`,
                                `Data Piket Tahunan Gagal Disimpan`,
                                `Okay`,
                            );
                        }
                    },
                    error: function(xhr) {
                        handleAjaxError(xhr);
                    }
                });
        }
        showDataPiket = () => {
            $.ajax({
                type: "GET",
                url: "{{ url('api/piket-tahunan') }}",
                dataType: "JSON",
                success: function(response) {
                    if (response.status) {
                        $.each(response.data, function(i, v) {
                            let html = `
                    <tr>
                        <td class="align-middle">
                            ${v.guru.nama_guru}
                        </td>
                        <td class="text-end" style="width:1%">
                            <button type="button"
                                class="btn btn-danger btn-sm btn-hapus"
                                data-id="${v.id}">
                                <i class="fa fa-minus"></i>
                            </button>
                        </td>
                    </tr>
                `;
                            $(`#hari-${v.hari.toLowerCase()}`).append(html);

                        });

                    } else {
                        alert('Gagal mengambil data piket tahunan.');
                    }
                },
                error: function(xhr) {
                    error_function(xhr);
                }
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
