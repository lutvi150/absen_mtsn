<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckAbsensiController;
use App\Http\Controllers\ControllerNotif;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ReportPdf;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    // return view('welcome');
    if (session()->get('data.role') == 'admin') {
        return redirect()->to('admin');
    } elseif (session()->get('data.role') == 'guru') {
        return redirect()->to('guru');
    } else {
        return view('login');
    }
});
// use for testing
Route::get('tes', [LoginController::class, 'form_login'])->name('tes');
Route::get('tes2', function () {
    // return session()->get('data');
    return response()->json([
        'status'  => 'success',
        'msg'     => 'success',
        'errors'   => null,
        'data'    => session()->get('data'),
        'content' => null,
    ], 200);
});
// end testing
Route::prefix('login')->group(function () {});
// admin route
Route::middleware(['auth', CheckRole::class . ':admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    // use for classroom
    Route::get('kelas/data', [KelasController::class, 'index'])->name('kelas');
    Route::post('kelas/kelas-add', [KelasController::class, 'store'])->name('kelas-add');
    Route::get('kelas/{kelasModel}/edit', [KelasController::class, 'edit'])->name('kelas-edit');
    Route::get('kelas/kelas-delete/{id}', [KelasController::class, 'destroy'])->name('kelas-delete');
    // student data 
    Route::get('data-siswa', [SiswaController::class, 'index'])->name('data-siswa');
    Route::get('siswa/siswa-add', [SiswaController::class, 'create'])->name('siswa-form');
    Route::post('siswa/siswa-add', [SiswaController::class, 'store'])->name('siswa-add');
    Route::get('siswa/siswa-edit/{id}', [SiswaController::class, 'edit'])->name('siswa-edit');
    Route::delete('siswa/{siswaModel}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    // use for teacher
    Route::get('guru/data', [GuruController::class, 'index'])->name('data-guru');
    Route::post('guru/guru-add', [GuruController::class, 'store'])->name('guru-add');
    Route::get('guru/{guruModel}/edit', [GuruController::class, 'edit'])->name('guru-edit');
    Route::get('guru/guru-delete/{id}', [GuruController::class, 'destroy'])->name('guru-delete');
    // teacher ajac
    Route::get('api/guru/data', [GuruController::class, 'getGuru'])->name('get-guru');
    Route::post('api/password/edit', [LoginController::class, 'changePassword'])->name('ubah-password');
    // attendance
    Route::post('absensi/buat-absensi', [GuruController::class, 'storeAttendance'])->name('admin-absensi-add');
    Route::get('absensi/check-absensi/{id_kelas}/{id_absen}', [CheckAbsensiController::class, 'index'])->name('guru-check-absensi');
    Route::delete('absensi/{absenModel}', [AbsenController::class, 'destroy'])->name('absen.destroy');
    // report
    Route::get('absensi/laporan-bulanan/{bulan}/{tahun}/{id_kelas}', [ReportPdf::class, 'reportAbsen'])->name('guru-report-absensi');
    // Route::get('absensi/laporan-bulanan', [ReportPdf::class, 'reportAbsen'])->name('admin-absensi');
    Route::get('absensi', [GuruController::class, 'absensi'])->name('admin-absensi');
});
// guru route
Route::prefix('guru')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('guru-dashboard');
    Route::get('absensi', [GuruController::class, 'absensi'])->name('guru-absensi');
    // make attendance
    Route::get('absensi/buat-absensi/{id}', [GuruController::class, 'makeAttendance'])->name('guru-absensiweb');
    Route::post('absensi/buat-absensi', [GuruController::class, 'storeAttendance'])->name('guru-absensi-add');
    Route::get('absensi/check-absensi/{id_kelas}/{id_absen}', [CheckAbsensiController::class, 'index'])->name('guru-check-absensi');
    Route::post('absensi/check-absensi', [CheckAbsensiController::class, 'store'])->name('guru-check-absensi-add');
    // all attendance
    Route::post('absensi/check-absensi-semua', [CheckAbsensiController::class, 'storeAll'])->name('guru-check-absensi-add-all');
    // report
    Route::get('absensi/laporan-bulanan/{bulan}/{tahun}/{id_kelas}', [ReportPdf::class, 'reportAbsen'])->name('guru-report-absensi');
});
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'login'])->name('login');
// use for chart data
Route::get('count-data-chart', [AdminController::class, 'countDataChart'])->name('count-data-chart');
// costume for chart data
Route::get('chart-data', [ReportPdf::class, 'chartData'])->name('chart-data');
// post data chart
Route::post('chart-data-post', [ReportPdf::class, 'chartDataPost'])->name('chart-data-post');
// zenziva
Route::get('whatsapp/{phonenumber}', [ControllerNotif::class, 'sendMessageFonte'])->name('whatsapp');
Route::get('check-balance', [ControllerNotif::class, 'checkBalance'])->name('check-balance');
Route::post('send-message', [ControllerNotif::class, 'sendMessage'])->name('send-message');
// check barcode
Route::post('check-barcode/{bulan}/{tahun}', [ReportPdf::class, 'reportAbsen'])->name('check-barcode');
