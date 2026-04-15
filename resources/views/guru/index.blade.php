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
                            <h3 class="box-title">Data Guru</h3>
                            <div style="margin-top:10px">
                                <button onclick="show_modal()" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>
                                    Tambah Guru</button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Nama Guru</th>
                                        <th>NIP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No. HP</th>
                                        <th style="width: 40px">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guru as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper($item['nama_guru']) }} <br> <label for="" class="label label-primary"> {{ $item->user->email }}</label></td>
                                            <td>{{ $item->nip }}</td>
                                            <td><label for="" class="label {{ $item->jenis_kelamin=="L" ? 'label-primary' : 'label-danger' }}">{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</label></td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>
                                               <img src="{{ $item->foto_url }}" alt="Foto Guru" class="foto-siswa">
                                            </td>
                                            <td style="width:40px">
                                                <button onclick="delete_data({{ $item->id }})"
                                                    class="btn btn-danger
                                                    btn-xs"><i
                                                        class="fa fa-trash"></i></button>
                                                <button onclick="edit_data({{ $item->id }})"
                                                    class="btn btn-warning
                                                    btn-xs"><i
                                                        class="fa fa-edit"></i></button>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-add-title">Modal title</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    <strong>Informasi</strong>
                    <ul>
                        <li>Isi form dengan benar</li>
                        <li>Pastikan data yang diinput sudah sesuai</li>
                        <li>Jangan menggunakan tanda baca (,) di kolom inputan</li>
                        <li><b>Password akan dibuat otomatis menggunakan NIP</b></li>
                    </ul>
                </div>
                <form enctype="multipart/form-data" id="form-add" action="{{route('guru-add')}}" method="POST">
                    <div class="mb-3">
                        <label for="nama guru" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                            placeholder="Masukkan Nama Guru">
                        <span class="e-nama_guru text-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email guru" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Masukkan Email Guru">
                        <span class="e-email text-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP Guru">
                        <span class="e-nip text-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <span class="e-jenis_kelamin text-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"
                            placeholder="Masukkan Alamat Guru"></textarea>
                        <span class="e-alamat text-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                            placeholder="Masukkan No HP Guru">
                        <span class="e-no_hp text-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <span class="e-foto text-error"></span>
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
        });
    </script>
    <script>
        
        show_modal = () => {
            sessionStorage.setItem('TY', 'POST');
            $('.modal-add-title').text('Tambah Data Siswa');
            $("#form-add")[0].reset();
            $("#form-add").attr('action', `{{ route('guru-add') }}`);
            $('.text-error').text('');
            $('#modal-add').modal('show');
        }
        store_data = () => {
            $(".text-error").text('');
            $("#form-add").ajaxForm({
                type: sessionStorage.getItem('TY'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $("#form-add").attr('action'),
                dataType: "JSON",
                success: function(response) {
                    if (response.status == true) {
                        Notiflix.Report.success(
                            `Berhasil`,
                            `"Data Siswa Berhasil Disimpan." <br/><br/>- Admin`,
                            `Okay`,
                        );
                        $('#modal-add').modal('hide');
                        location.reload();
                    } else {
                        $.each(response.errors, function(key, value) {
                            $(`.e-${key}`).text(value[0]);
                        });
                        Notiflix.Report.failure(
                            `Kesalahan`,
                            `"Data Kelas Gagal Disimpan." <br/><br/>- Admin`,
                            `Okay`,
                        );
                    }
                },
                error: function(xhr) {
                    handleAjaxError(xhr);
                }
            }).submit();
        }
        edit_data = (id) => {
            $(".text-error").text('');
            $("#form-add")[0].reset();
            $("#form-add").attr('action', `${BASE_URL}/api/guru/${id}`);
            sessionStorage.setItem('TY', 'PUT');
            $.ajax({
                type: "GET",
                url: `${BASE_URL}/api/guru/${id}`,
                dataType: "JSON",
                success: function(response) {
                    let jenis_kelamin=`
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" ${response.data.jenis_kelamin == 'L' ? 'selected' : ''}>Laki-laki</option>
                    <option value="P" ${response.data.jenis_kelamin == 'P' ? 'selected' : ''}>Perempuan</option>
                    `;
                    $('#jenis_kelamin').html(jenis_kelamin);
                    $('.modal-add-title').text('Edit Data Guru');
                    $("#email").val(response.data.guru.email);
                    $('#nama_guru').val(response.data.nama_guru);
                    $('#nip').val(response.data.nip);
                    $('#alamat').val(response.data.alamat);
                    $('#no_hp').val(response.data.no_hp);
                    $('#modal-add').modal('show');
                },
                error: function(xhr) {
                    handleAjaxError(xhr);
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
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `${BASE_URL}/api/guru/${id}`,
                        success: function(response) {
                            if (response.status == true) {
                                Notiflix.Report.success(
                                    `Berhasil`,
                                    `"Data Guru Berhasil Dihapus." <br/><br/>- Admin`,
                                    `Okay`,
                                );
                                location.reload();
                            } else {
                                Notiflix.Report.failure(
                                    `Gagal`,
                                    `"Data Kelas Gagal Dihapus." <br/><br/>- Admin`,
                                    `Okay`,
                                );
                            }
                        },
                        error: function(xhr) {
                            handleAjaxError(xhr);
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
