<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Personnel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'Nomper', 'prenomper', 'email', 'password', 'immat', 'date_naissance',
        'grade', 'CIN', 'date_affectation', 'diplome', 'lieu_naissance', 'photo_profil','role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Mutator pour stocker le chemin de la photo de profil
    public function setPhotoProfilAttribute($value)
    {
        // Vérifie si $value est un objet UploadedFile
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            // Stocke le fichier dans le dossier 'photos_profil' du stockage public
            $this->attributes['photo_profil'] = $value->store('photos_profil', 'public');
        } else {
            // Si $value n'est pas un objet UploadedFile, il pourrait déjà contenir le chemin du fichier
            $this->attributes['photo_profil'] = $value;
        }
    }

    // Accessor pour récupérer le chemin complet de la photo de profil
    public function getPhotoProfilAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value);
        }
        return null;
    }

    public function organismes()
    {
        return $this->belongsToMany(Organisme::class, 'organisme_personnel', 'personnel_id', 'organisme_id');
    }



    public function absences()
    {
        return $this->hasMany(Abscence::class, 'immat_per', 'immat');
    }
    public function conges()
    {
        return $this->hasMany(Conge::class);
    }
    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
    public function attestations()
    {
        return $this->hasMany(Attestation::class);
    }
    public function isDirecteur()
    {
        return $this->role === 'directeur';
    }


}
