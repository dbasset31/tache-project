<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public function companie_option()
    {
        return $this->hasMany(Companies_option::class);
    }
}
