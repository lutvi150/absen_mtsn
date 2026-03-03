<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $fillable = [
        'id_user',
        'nama_siswa',
        'nisn',
        'jenis_kelamin',
    ];
    public function orangtua()
    {
        return $this->hasMany(OrangtuaModel::class, 'id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'id_kelas');
    }
    function checkAbsensi() {}
    public $timestamps = true;
    // public function siswa(){
    //     return $this->belongsTo(KelasModel::class,'id_kelas');
    // }
}
