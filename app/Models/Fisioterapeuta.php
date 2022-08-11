<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisioterapeuta extends Model
{
    use HasFactory;
    protected $fillable = [
        'fiste_name',
        'fiste_document',
        'fiste_expert',
        'fiste_birth_date',
        'fiste_gender',
        'fiste_hexcolor',
        'fiste_phone',
        'fiste_cell_phone',
        'fiste_email',
    ];

    public function cita(){
        return $this->belongsToMany(Cita::class);
    }
}
