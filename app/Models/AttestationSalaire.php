<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttestationSalaire extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attestation_id',
        'salary',
        'currency',
        'salary_date',
    ];

    /**
     * Get the attestation that owns the salary attestation.
     */
    public function attestation()
    {
        return $this->belongsTo(Attestation::class);
    }
}
