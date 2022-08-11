<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;
    protected $fillable = [
        'entity_name',
        'entity_phone',
        'entity_cell_phone',
        'entity_email',
    ];

    public function paciente(){
        return $this->hasMany(Paciente::class);
    }
}