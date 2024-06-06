<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttestationTravail extends Model
{
    use HasFactory;
    protected $fillable = [
        'attestation_id',
        'position',
        'department',
        'date_start',
        'date_end',
    ];

    public function attestation()
    {
        return $this->belongsTo(Attestation::class);
    }
}
