<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisioterapeuta extends Model
{
    use HasFactory;
    protected $fillable = ['fiste_id', 'fiste_name', 'fiste_hexcolor'];
    public function cita(){
        return $this->belongsToMany(Cita::class);
    }
}
