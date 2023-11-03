<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penalty extends Model
{
    use HasFactory;

    protected $table = 'penalty';
    protected $primaryKey = 'id_penalty';
    protected $fillable = [
        'id_penalty',
        'penalty_audit',
        'penalty_name',
        'penalty_staff',
        'penalty_risk_level',
        'penalty_rate',
        'penalty_notes',
        'penalty_isaktif',
    ];
}