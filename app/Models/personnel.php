<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\abscence;

class personnel extends Model
{
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
            return $this->hasMany(abscence::class, 'immat_per', 'immat');
        }
}
