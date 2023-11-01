<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    protected $fillable = [
        'id_risk',
        'nama_staff',
        'username_staff',
        'nomor_staff',
        'id_staff_auditee',
        'id_staff_position',
        'isaktif_staff',
    ];
}
