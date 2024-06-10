<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut_mission',
        'date_fin_mission',
        'heure_debut',
        'heure_fin',
        'destination',
        'objet',
        'immat_pers',
        'personnel_id',
        'moyen_transport_id'
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }

    public function moyenTransport()
    {
        return $this->belongsTo(MoyenTransport::class);
    }
    public function personnels()
    {
        return $this->belongsToMany(Personnel::class, 'personnel_missions', 'mission_id', 'personnel_id')
                    ->withTimestamps();
    }
}
