<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'repetition',
        'time',
        'day',
        'start_time',
        'finish_time',
        'remark',
        'id_client',
    ];

}
