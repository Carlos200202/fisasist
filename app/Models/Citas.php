<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    static $rules = ['pat_document','pat_firstname','pat_lastname','fist_name','flag_img','description','resourceId','start','end',];

    protected $fillable = ['pat_document','pat_firstname','pat_lastname','fist_name','flag_img','description','resourceId','start','end'];
}
