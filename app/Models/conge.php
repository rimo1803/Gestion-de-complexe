<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conge extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut', 'date_fin', 'decision_conge', 'status', 'reliquat', 'remplacement', 'immat_per'
    ];
    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'immat_per', 'immat');
    }
}
