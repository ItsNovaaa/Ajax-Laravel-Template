<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    use HasFactory;
    

    protected $table = 'jenis_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = [
        'id_kegiatan',
        'nama_kegiatan',
        'kode_kegiatan',
        'id_kegiatan_auditee',
        'isaktif_kegiatan'
    ];
}
