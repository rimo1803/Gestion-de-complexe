<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conge extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut', 'date_fin', 'decision_conge', 'status', 'reliquat', 'remplacement', 'personnel_id'
    ];
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
    public function calculateReliquat()
    {
        $dateDebut = Carbon::parse($this->date_debut);
        $dateFin = Carbon::parse($this->date_fin);
        return $dateFin->diffInDays($dateDebut);
    }
}

