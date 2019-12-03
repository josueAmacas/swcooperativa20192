<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'modelo_transaccion';
 

    protected $fillable = [
        'fechaTransaccion', 'tipo', 'valor','descripcion', 'responsable', 'cuenta_id',
    ];

    public $timestamps = false; 

}
