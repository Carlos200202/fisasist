<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'pat_firstname',
        'pat_secondname',
        'pat_lastname',
        'pat_second_lastname',
        'pat_document',
        'pat_gender',
        'pat_birth_date',
        'pat_location',
        'pat_entity_id',
        'pat_number_policy',
        'pat_phone',
        'pat_cell_phone',
        'pat_email',
    ];
    public function cita(){
        return $this->belongsToMany(Cita::class);
    }
    public function entidad(){
        return $this->hasMany(Entidad::class);
    }
}
