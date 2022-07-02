<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function invitation()
    {
        return $this->hasMany(Invitation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
