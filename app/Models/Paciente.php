<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = ['pat_firstname', 'pat_lastname', 'pat_document', 'pat_ages', 'cita_id']; // 'cita_id'
    public function cita(){
        return $this->belongsToMany(Cita::class);
    }
}
