<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'repetition',
        'time',
        'day',
        'start_time',
        'final_time',
        'remark'
    ];

    public function session() {

    }

}
