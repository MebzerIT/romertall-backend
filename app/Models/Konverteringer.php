<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konverteringer extends Model
{
    use HasFactory;
    
    protected $table = 'konverteringer';

    protected $fillable = [
        'integertall',
        'romertall'

    ];

}
