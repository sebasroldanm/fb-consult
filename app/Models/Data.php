<?php

namespace App\Models;

class Data extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
