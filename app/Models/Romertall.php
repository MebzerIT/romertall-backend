<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Romertall extends Model
{
    use HasFactory;

    public function konverteringer(){
        return $this->hasMany(Konverteringer::class);
    }
}
