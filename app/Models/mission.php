<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut_mission', 'date_fin_mission', 'heure_debut', 'heure_fin', 'destination', 'objet', 'personnel_id'
    ];

    /**
     * Relation avec le modèle Personnel.
     */
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }

    /**
     * Relation avec le modèle MoyenTransport.
     */
    public function moyenTransport()
    {
        return $this->belongsTo(MoyenTransport::class, 'moyen_transport_id');
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
