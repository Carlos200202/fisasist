<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    static $rules = ['document'=>'required','name'=>'required','description'=>'required','resourceId'=>'required','start'=>'required','end'=>'required',];

    protected $fillable = ['document', 'name', 'description', 'resourceId', 'start', 'end'];
}
