<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personnel_organisme extends Model
{
    use HasFactory;

    protected $table = 'organisme_personnel';

    protected $fillable = [
        'organisme_id', 'personnel_id'
    ];

    /**
     * Définir si les timestamps doivent être activés pour le modèle.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relation avec le modèle Organisme.
     */
    public function organisme()
    {
        return $this->belongsTo(Organisme::class);
    }

    /**
     * Relation avec le modèle Personnel.
     */
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}

