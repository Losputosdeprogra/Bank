<?php

class ConectarBD {

    public static function send($BD,$sql) {
        $host = "localhost";
        $usuariodb = "root";    
        $clavedb = "";
        try {   
            $conexion = new mysqli($host, $usuariodb, $clavedb, $BD);
        } catch (Exception $e) {
            echo $e->errorMessage();
            exit(0);
        }
        if ($conexion->connect_errno) {
            echo "<br>Error..!! No hay Conexion a BD ";
            $conexion = false;
            exit(0);
        }
        
        $rows = $conexion->query($sql);
        $conexion->close();
        return $rows;
    }
    
    public static function conectar($basededatos) {
        $host = "localhost"; //define el servidor
           //define el nombre de la base de datbos
        $usuariodb = "root";    //nombre del usuario autorizado para la BD
        $clavedb = "";  //password del usuario
        try {   //bloque de proteccion de fallos mediante intentos
            $conexion = new mysqli($host, $usuariodb, $clavedb, $basededatos);//crea una instancia para conectar a BD
        } catch (Exception $e) {    //atrapa el posible error
            echo $e->errorMessage();    //muestra el error
            exit(0);    //termina el proceso
        }
        if ($conexion->connect_errno) {//verifica si la conexion tuvi algun error
            echo "<br>Error..!! No hay Conexion a BD ";
            $conexion = false;//retorna falso para indicar que fallo la conexion
            exit(0);
        }
        return($conexion);//retorna un objeto con la conexion a la bd
    }
    
}
