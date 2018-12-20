<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReciboPago extends Model
{
 
    protected $table='recibopago';

    protected $primaryKey='idrecibopago';

    public $timestamps=true;

    protected $fillable =[
     'idproveedor',
     'tipo_comprobante',
     'serie_comprobante',
     'num_comprobante',
     'fecha_hora',
     'monto',
     'estado',
     'descripcion',
     'obs'
    ];
    protected $guarded =[
    ];
}