<?php

namespace App\Models;

use App\Models\personnel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class abscence extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(personnel::class);
    }
    public function personnel()
{
    return $this->belongsTo(personnel::class, 'immat_per', 'immat');
}
}
