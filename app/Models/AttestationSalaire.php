<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttestationSalaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'attestation_id', 'salary', 'currency', 'salary_date'
    ];

    public function attestation()
    {
        return $this->belongsTo(Attestation::class);
    }
}
