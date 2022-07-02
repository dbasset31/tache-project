<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies_option extends Model
{
    use HasFactory;

    public function companie()
    {
        return $this->belongsTo(Companie::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
