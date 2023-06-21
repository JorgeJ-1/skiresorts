<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkiResort extends Model
{
    use HasFactory;
    protected $fillable=['name','town','country','lifts','slopeKms','isOpen'];
    protected $table='skiresorts';
}
