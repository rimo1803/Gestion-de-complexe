<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organisme extends Model
{
    public function complexe()
    {
        return $this->belongsTo(Complexe::class);

    }
    public function personnels()
{
    return $this->belongsToMany(Personnel::class, 'organisme_personnel', 'organisme_id', 'personnel_id');
}
}
