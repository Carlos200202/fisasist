<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    static $rules = ['paciente_id','fisioterapeuta_id','flag_img','description','resourceId','start','end',];

    protected $fillable = ['flag_img','description','resourceId','start','end','fisioterapeuta_id','paciente_id','start','end'];

    public function fisioterapeuta(){
        return $this->belongsToMany(Fisioterapeuta::class);
    }

    public function paciente(){
        return $this->belongsToMany(Paciente::class);
    }
}
