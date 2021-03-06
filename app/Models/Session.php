<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'day'
    ];

    public function person () {
        return $this->hasOne(Person::class);
    }

    public function training() {
        return $this->hasMany(Training::class);
    }

}
