<?php

namespace App\Http\Controllers;

use App\Models\CheckAbsensiModel;
use App\Models\KelasModel;
use App\Models\OrangtuaModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\map;

class CheckAbsensiController extends Controller
{
    public function index($id_kelas, $id_absen)
    {
        $siswa = SiswaModel::where('id_kelas', $id_kelas)->get();
        $check = [];
        foreach ($siswa as $s) {
            $checkAbsen = CheckAbsensiModel::where('id_siswa', $s->id)->where('id_absensi', $id_absen)->first();
            $check[] = [
                'id_siswa' => $s->id,
                'nama_siswa' => $s->nama_siswa,
                'nisn' => $s->nisn,
                'foto' => $s->foto,
                'status' => $checkAbsen ? $checkAbsen->status : 'Belum Absen',
                'keterangan' => $checkAbsen ? $checkAbsen->keterangan : '-',
            ];
        }
        $kelas = KelasModel::find($id_kelas);
        $title = "Check Absensi";
        return view('check_absensi.index', compact('siswa', 'id_absen', 'kelas', 'title', 'check'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_siswa' => 'required',
            'status' => 'required',
            'id_absensi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ],
                400
            );
        }
        if ($request->status == 'Alfa') {
            $siswa = SiswaModel::find($request->id_siswa);
            $orangtua = OrangtuaModel::where('id_siswa', $siswa->id)->first();
            $phonenumber = $orangtua->no_hp;
            // $userkey = env('zenziva_userkey');
            // $apiKey  = env('zenziva_apikey');
            // costume message
            $jam = date('H');
            if ($jam >= 5 && $jam < 11) {
                $waktu = "Selamat Pagi";
            } elseif ($jam >= 11 && $jam < 15) {
                $waktu = "Selamat Siang";
            } elseif ($jam >= 15 && $jam < 18) {
                $waktu = "Selamat Sore";
            } else {
                $waktu = "Selamat Pagi";
            }
            $sekolah = env('APP_NAME');
            $message  = "$waktu, ini adalah pesan otomatis dari sistem absensi $sekolah, anak anda yang bernama $siswa->nama_siswa tidak hadir hari ini, silahkan konfirmasi kepada pihak sekolah. Terima kasih";
            $response = Http::withHeaders([
                'Authorization' => 'eX1mHRLoskQXNVbdkPsq', // Ganti dengan token kamu
            ])->post('https://api.fonnte.com/send', [
                'target' => $phonenumber,
                'message' => $message,
            ]);

            if ($response->successful()) {
                // return $response->json();
            } else {
                // return response()->json([
                //     'error' => $response->body(),
                // ], $response->status());
            }
            // $response = Http::withOptions(['verify' => false])->asForm()->post('https://console.zenziva.net/wareguler/api/sendWA/', [
            //     'userkey' => $userkey,
            //     'passkey' => $apiKey,
            //     'to'      => $phonenumber,
            //     'message' => $message,
            // ]);
        }
        $check_absensi = CheckAbsensiModel::updateOrCreate(
            [
                'id_siswa' => $request->id_siswa,
                'id_absensi' => $request->id_absensi,
            ],
            [
                'status'     => $request->status,
                'keterangan' => $request->keterangan == null ? '-' : $request->keterangan,
            ]
        );
        return response()->json(
            [
                'status' => true,
                'message' => 'Data berhasil disimpan',
                'reques' => $request->all()
            ],
            200
        );
    }
    public function storeAll(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_absensi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ],
                400
            );
        }
        $siswa = SiswaModel::where('id_kelas', $request->id_kelas)->get();
        foreach ($siswa as $s) {
            $check_absensi = CheckAbsensiModel::updateOrCreate(
                [
                    'id_siswa' => $s->id,
                    'id_absensi' => $request->id_absensi,
                ],
                [
                    'status'     => "Hadir",
                    'keterangan' => $request->keterangan == null ? '-' : $request->keterangan,
                ]
            );
        }
        return response()->json(
            [
                'status' => true,
                'message' => 'Data berhasil disimpan',
                'reques' => $request->all()
            ],
            200
        );
    }

    public function show(CheckAbsensiModel $checkAbsensiModel) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CheckAbsensiModel $checkAbsensiModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CheckAbsensiModel $checkAbsensiModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckAbsensiModel $checkAbsensiModel)
    {
        //
    }
}
