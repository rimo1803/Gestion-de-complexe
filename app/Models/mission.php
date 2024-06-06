<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mission extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_debut_mission', 'date_fin_mission', 'heure_debut', 'heure_fin', 'destination', 'objet', 'immat_pers'
    ];

    /**
     * Relation avec le modèle Personnel.
     */
    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'immat_pers', 'immat');
    }

    /**
     * Relation avec le modèle MoyenTransport.
     */
    public function moyenTransport()
    {
        return $this->belongsToMany(MoyenTransport ::class, 'personnel_missions', 'mission_id', 'moyen_transport_id')
                    ->withTimestamps();
    }

    /**
     * Relation avec le modèle Personnel à travers la table pivot personnel_missions.
     */
    public function personnels()
    {
        return $this->belongsToMany(Personnel::class, 'personnel_missions', 'mission_id', 'personnel_id')
                    ->withTimestamps();
    }
}
