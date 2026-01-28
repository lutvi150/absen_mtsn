<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsenModel extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['tanggal', 'jam_masuk', 'jam_keluar', 'mata_pelajaran', 'id_kelas', 'jumlah_siswa', 'id_guru'];
    public $timestamps = true;
    public function guru()
    {
        return $this->belongsTo(GuruModel::class, 'id_guru');
    }
}
