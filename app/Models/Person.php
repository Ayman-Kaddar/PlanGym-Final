<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tel',
        'age',
        'gender',
    ];

    public function user () {
        return $this->hasOne(User::class);
    }
}
