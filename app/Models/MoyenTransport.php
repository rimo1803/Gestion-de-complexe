<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenTransport extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_trsp',
        'num_immat',
        'marque',
        'puissance_fiscale',
    ];

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
