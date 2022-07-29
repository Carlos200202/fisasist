<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;
    protected $fillable = [];
    public function paciente(){
        return $this->hasMany(ModelsPaciente::class);
    }
}