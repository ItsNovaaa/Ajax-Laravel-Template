<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditee extends Model
{
    use HasFactory;

    protected $table = 'auditee';
    protected $primaryKey = 'id_auditee';
    protected $fillable = [
        'id_auditee',
        'nama_auditee',
        'kode_auditee',
        'isaktif_auditee'
    ];
}
