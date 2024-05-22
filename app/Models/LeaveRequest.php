<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'start_date',
        'end_date',
        'status',
    ];

    // Définir la relation avec le personnel qui a fait la demande
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
