<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lname',
        'tel',
        'age',
        'gender',
        'role',
        'id_user'
    ];

    
    public function user() {
        return $this->hasOne(User::class);
    }

}
