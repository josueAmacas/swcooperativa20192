<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cuenta;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ClienteController extends BaseController
{
    public function index(Request $request){
    	$clientes = Cliente::all();
    	return response()->json($clientes, 200);
    }

    public function getCliente(Request $request, $cedula){
    	if($request->isJson()){
	    	$cliente = Cliente::where('cedula',$cedula)->get();
	    	if(!$cliente->isEmpty()){
	    		$status = true;
	    		$info = "Data is listen successfully";
	    	}else{
	    		$status = false;
	    		$info = "Data is not listen successfully";
	    	}
    		return ResponseBuilder::result($status, $info, $cliente);
    	}else{
    		$status = false;
	    	$info = "Unauthorized";
    	}
    	return ResponseBuilder::result($status, $info);
    }

    public function createCliente(Request $request){
    	$cliente = new Cliente();
    	$cliente->cedula = $request->cedula;
    	$cliente->apellidos = $request->apellidos;
    	$cliente->nombres = $request->nombres;
    	$cliente->genero = $request->genero;
    	$cliente->estadoCivil = $request->estadoCivil;
    	$cliente->fechaNacimiento = $request->fechaNacimiento;
    	$cliente->correo = $request->correo;
    	$cliente->telefono = $request->telefono;
    	$cliente->celular = $request->celular;
    	$cliente->direccion = $request->direccion;    	
    	$cliente->save();

    	$cuenta = new Cuenta();
    	$cuenta->numero = $request->numero; 
    	$cuenta->estado = True; 
    	$cuenta->fechaApertura = $request->fechaApertura; 
    	$cuenta->tipoCuenta = $request->tipoCuenta; 
    	$cuenta->saldo = $request->saldo; 
    	$cuenta->cliente_id = $cliente;
    	$cuenta->save(); 

    	return response()->json($cliente);
    }
}
