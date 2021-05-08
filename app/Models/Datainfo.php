<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datainfo extends Model
{
    use HasFactory;
    protected $table = 'tb_colombia';
    protected $primaryKey = 'id';
    protected $fillable = [
        'celular', 
        'fbid', 
        'nombre', 
        'apellido', 
        'genero', 
        'ciudad', 
        'ubicacion', 
        'civil', 
        'trabajo', 
        'fecha'
    ];
}
