<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class konverteringer extends Model {

    use HasFactory;
    
    protected $table = 'konverteringer';

    protected $fillable = [
        'integertall',
        'romertall'
      ];
    
    //defining the validation rules 
    public static $rules = [
        'integertall' => 'required|integer',
        'romertall' => 'required|regex:/^[IVXLCDM]+$/',
      ];

    //validating data before its stored, 
    // preventing invalid data from been stored and SQL injection attacks
    public static function boot(){
        parent::boot();
        // using Validator, Laravels built-in validation system, used to validate data.
        static::saving(function($model) {
            $validator = Validator::make($model->toArray(), static::$rules);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
        });
    } 
}


