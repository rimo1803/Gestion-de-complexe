<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complexe extends Model
{
    public function organismes()
    {
        return $this->hasMany(Organisme::class);
    }
}
