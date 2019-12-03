<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'modelo_cuenta';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero', 'estado', 'fechaApertura', 'tipoCuenta', 'saldo', 'cliente_id',
    ];

    protected $primaryKey= 'cuenta_id';

    public $timestamps = false;


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
    protected $hidden = [
        'password',
    ];*/
}
