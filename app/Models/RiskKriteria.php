<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskKriteria extends Model
{
    use HasFactory;

    protected $table = 'risk_kriteria';
    protected $primaryKey = 'id_risk';
    protected $fillable = [
        'id_risk',
        'nama_risk',
        'kode_risk',
        'level_risk',
        'isaktif_risk'
    ];
}
