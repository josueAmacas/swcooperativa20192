<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Transaccion;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TransactionController extends BaseController
{
    public function realizarTransaccion(Request $request){
        
        //if($request->isJson()){
            $cuenta = Cuenta::where('numero', $request -> numero)->first();
            $transaccion = new Transaccion();
            if ($cuenta != null) {
                $transaccion -> fechaTransaccion = $request -> fechaTransaccion;
                $transaccion -> tipo = $request -> tipo;
                if ($transaccion->tipo == 'deposito') {
                    $valor = $request -> valor;
                    $cuenta-> $saldo = $cuenta->saldo + $valor;
                    $transaccion -> valor = $valor;
                    $cuenta-> save(); 
                }
                $transaccion-> descripcion = $request-> descripcion;
                $transaccion->responsable = $request->responsable;
                $transaccion -> cuenta_id = $cuenta -> cuenta_id;   
                $transaccion->save();
                $status = true;
                $info = "Deposito Realizado";
            }else{
                $status = false;
                $info = "Transaction is not done";
            }
        //}
        return ResponseBuilder::result($status, $info, $transaccion);
    }

}
