<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskLevel extends Model
{
    use HasFactory;

    protected $table = 'risk_level';
    protected $primaryKey = 'risk_level_id';
    protected $fillable = [
        'risk_level_id',
        'risk_level_name',
        'risk_level_audit',
        'risk_level_date',
        'risk_level_risk_kriteria',
        'risk_level_kegiatan',
        'risk_level_total',
        'risk_level_risk',
        'risk_level_note',
        'risk_level_isaktif'
    ];
    public function jenisKegiatan()
    {
        return $this->belongsTo(JenisKegiatan::class, 'risk_level_kegiatan');
        // 'jenis_kegiatan_id' is the foreign key column in the 'risk_levels' table
    }
    public function auditee()
    {
        return $this->belongsTo(auditee::class, 'risk_level_audit');
        // 'jenis_kegiatan_id' is the foreign key column in the 'risk_levels' table
    }
    public function riskKriteria()
    {
        return $this->belongsTo(RiskKriteria::class, 'risk_level_risk_kriteria');
        // 'jenis_kegiatan_id' is the foreign key column in the 'risk_levels' table
    }
}
