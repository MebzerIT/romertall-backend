<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konverteringer extends Model
{
    use HasFactory;

    public function romertall(){
        return $this->belongsTo(Romertall::class);
    }
}
