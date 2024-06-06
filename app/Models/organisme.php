<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organisme extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_organisme', 'telephone', 'code', 'email', 'fax', 'adresse', 'complexe_id'
    ];

    /**
     * Relation avec le modèle Complexe.
     */
    
    /**
     * Relation avec le modèle Personnel à travers la table pivot organisme_personnel.
     */
    public function personnels()
    {
        return $this->belongsToMany(Personnel::class, 'organisme_personnel', 'organisme_id', 'personnel_id')
                    ->withTimestamps();
    }
}
