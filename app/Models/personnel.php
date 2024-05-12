<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\abscence;
use App\Models\Role;


use Illuminate\Notifications\Notifiable;

class Personnel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'Nomper', 'prenomper', 'email', 'password', 'immat', 'date_naissance', 'grade', 'CIN', 'date_affectation', 'diplome', 'lieu_naissance', 'photo_profil',
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
public function role()
{
    return $this->belongsTo(Role::class, 'role_id');
}



    public function absences()
        {
            return $this->hasMany(abscence::class, 'immat_per', 'immat');
        }
    public function personnel()
        {
            return $this->hasOne(Personnel::class)->where('id', $this->id);
        }
        public function roles()
        {
            return $this->belongsToMany(Role::class);
        }
        public function hasRole($roleName)
        {
            $role = $this->roles()->where('name', $roleName)->first();
            return $role !== null;
        }
        public function login(Request $request)
        {
            // Vérifiez les informations d'identification de l'utilisateur
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Récupérez l'utilisateur authentifié
                $user = Auth::user();
                // Redirigez en fonction du rôle de l'utilisateur
                if ($user->hasRole('directeur')) { // Correction ici : 'directeur' au lieu de 'director'
                    return redirect()->route('layouts.mainadmin');
                } elseif ($user->hasRole('normal_user')) {
                    return redirect()->route('layouts.mainuser');
                }
            }

            // Redirection en cas d'échec de l'authentification
            return redirect()->back()->withInput()->withErrors(['email' => 'Email ou mot de passe incorrect']);
        }

}
