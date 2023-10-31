<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $primaryKey = 'id_position';
    protected $fillable = [
        'id_position',
        'nama_position',
        'kode_position',
        'deskripsi_position',
        'isaktif_position'
    ];

}
