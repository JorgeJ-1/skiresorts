<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alojamiento extends Model
{
    use HasFactory;
    protected $primaryKey ='phone';
    protected $fillable=['phone','name','town','type'];
}
