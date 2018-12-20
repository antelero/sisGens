<?php

namespace App;
//namespace demo;
use Illuminate\Database\Eloquent\Model;
class Categoria extends Model
{
    protected $table='categoria';
    protected $primaryKey='idcategoria';
    public $timestamps=false;
    protected $fillable =[
     'nombre',
     'descripcion',
     'condicion'
    ];
    protected $guarded =[
    ];
}
