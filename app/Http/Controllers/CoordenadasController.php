<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;


class CoordenadasController extends Controller{
    

    public function getAll(){
        $error = "";
        $data = "";
        $client = new Client();
             
        $request = $client->get('https://coordenadasapp.firebaseio.com/dispositivos.json');
        $response = json_decode($request->getBody()->getContents());

        if(!empty($response)){
            $status = "200";
            $data = $response;
        }else{
            $status = "404";
            $error = "No se encontró información en la base de datos";
        }

        $object = array('data' => $data, 'status' => $status, 'error' => $error);

        return $object;
    }


    public function nuevoRegistro(Request $request){

        $params = json_encode($request->all());
        $error = "";
        $data = "";

        $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $request = $client->post('https://coordenadasapp.firebaseio.com/dispositivos.json?', ['body' => $params]);
        $response = json_decode($request->getBody()->getContents());

        if(!empty($response)){
            $status = "200";
            $data = $response->name;
        }else{
            $status = "500";
            $error = "No se pudo guardar la información del dispositivo";
        }

        $object = array('data' => $data, 'status' => $status, 'error' => $error);

        return $object;
    }


    public function registroUbicacion(Request $request){

        $params = json_encode($request->all());
        $error = "";
        $data = "";

        $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $request = $client->post('https://coordenadasapp.firebaseio.com/dispositivos.json?', ['body' => $params]);
        $response = json_decode($request->getBody()->getContents());

        if(!empty($response)){
            $status = "200";
            $data = $response->name;
        }else{
            $status = "500";
            $error = "No se pudo guardar la ubicación del dispositivo";
        }

        $object = array('data' => $data, 'status' => $status, 'error' => $error);

        return $object;
    }


    public function actualizarUbicacion(Request $request){

        if(!empty(trim($request->id))){
            
            $client = new Client();
            $error = "";
            $data = "";
            $params = json_encode($request->all());
                 
            $request = $client->patch('https://coordenadasapp.firebaseio.com/dispositivos/'.$request->id.'.json', ['body' => $params]);
            $response = json_decode($request->getBody()->getContents());

            if(!empty($response)){
                $status = "200";
                $data = $response;
            }else{
                $status = "404";
                $error = "No se encontró un dispositivo relacionado al id ".$request->id. " y no se pudo actualizar";
            }

        }else{
            $status = "500";
            $error = "Debe enviar el id";
        }

        $object = array('data' => $data, 'status' => 200, 'error' => $error);

        return $object;
    }

}
