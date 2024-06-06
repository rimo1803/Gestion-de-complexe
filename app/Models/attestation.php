<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'type_attestation', 'date_edition', 'reference', 'immat_per'
    ];

    public function travail()
    {
        return $this->hasOne(AttestationTravail::class);
    }

    public function salaire()
    {
        return $this->hasOne(AttestationSalaire::class);
    }
}
