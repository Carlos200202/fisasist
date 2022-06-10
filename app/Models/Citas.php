<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    static $rules = ['document'=>'required','nombre'=>'required','description'=>'required','start'=>'required','end'=>'required',];

    protected $fillable = ['document', 'nombre', 'description', 'start', 'end'];
}
