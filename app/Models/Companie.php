<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function companies_option()
    {
        return $this->hasMany(Companies_option::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
