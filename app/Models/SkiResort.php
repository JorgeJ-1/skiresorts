<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Para usar los softdeletes se debe incluir el trait SoftDeletes, en el modelo.


class SkiResort extends Model
{
    use HasFactory, SoftDeletes; 
    protected $fillable=['name','town','country','lifts','slopeKms','runs','openRuns','isOpen','seasonStart','seasonEnd','image','user_id'];
    protected $table='skiresorts';
    
    //
    public function user(){
        return $this->belongsTo('User');
    }
}
