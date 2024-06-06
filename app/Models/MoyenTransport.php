<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenTransport extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_trsp', 'num_immat', 'marque', 'puissance_fiscale'
    ];

    /**
     * Relation avec le modèle Mission à travers la table pivot personnel_missions.
     */
    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'personnel_missions', 'moyen_transport_id', 'mission_id')
                    ->withTimestamps();
    }
}
