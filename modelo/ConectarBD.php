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
    
}
