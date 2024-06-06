<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abscence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_debut',
        'date_fin',
        'type_abscence',
        'justification',
        'immat_per',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    /**
     * Get the personnel associated with the absence.
     */
    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'immat_per', 'immat');
    }
}
