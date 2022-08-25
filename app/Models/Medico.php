<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $fillable = [
        'med_name',
    ];

    public function cita(){
        return $this->belongsToMany(Cita::class);
    }
}
