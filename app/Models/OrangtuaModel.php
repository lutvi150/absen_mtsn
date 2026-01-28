<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangtuaModel extends Model
{
    protected $table = "orang_tua";
    protected $fillable = ["id_siswa", "nama", "jenis", "pekerjaan", "alamat", "no_hp"];
    public $timestamps = true;
    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'id_siswa');
    }
}
