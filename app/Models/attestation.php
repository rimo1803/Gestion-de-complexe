<?php

namespace App\Models;

use App\Models\personnel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'type_attestation', 'date_edition', 'reference', 'personnel_id', 'document','status',
    ];

    public function travail()
    {
        return $this->hasOne(AttestationTravail::class);
    }

    public function salaire()
    {
        return $this->hasOne(AttestationSalaire::class);
    }
    public function personnel()
    {
        return $this->belongsTo(personnel::class);
    }
}
