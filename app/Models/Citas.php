<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    static $rules = ['document','name','description','resourceId','start','end',];

    protected $fillable = ['document', 'name', 'description', 'resourceId', 'start', 'end'];
}
