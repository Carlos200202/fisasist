<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    static $rules = [
        'paciente_id',
        'fisioterapeuta_id',
        'medico_id',
        'type_visit',
        'process',
        'complexity',
        'contact_name',
        'contact_relationship',
        'contact_cell_phone',
        'observations',
        'resourceId',
        'start',
        'end',
    ];

    protected $fillable = [
        'paciente_id',
        'fisioterapeuta_id',
        'medico_id',
        'type_visit',
        'process',
        'complexity',
        'contact_name',
        'contact_relationship',
        'contact_cell_phone',
        'observations',
        'resourceId',
        'start',
        'end',
    ];
    
    public function medico(){
        return $this->belongsToMany(Medico::class);
    }

    public function fisioterapeuta(){
        return $this->belongsToMany(Fisioterapeuta::class);
    }

    public function paciente(){
        return $this->belongsToMany(Paciente::class);
    }
}
