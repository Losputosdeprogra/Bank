<?php

require_once __DIR__.'/../../modelo/UsuariosModelo/AdministradorModelo.php';
require_once __DIR__.'/../../modelo/Mostrar.php';
session_start();

$admin=new AdministradorModelo();
$nombre=$_SESSION["nombre"];

$TipoDeLista = $_POST["Listar"];

$sql = "SELECT id_cliente from administradores WHERE nombre = '$nombre'";
$admin->setIdCliente(ConectarBD::send("bd_usuario", $sql));

if (isset($_POST['btn_Crear_Sucursal'])){
    
      require_once __DIR__ . '/../../vista/VistasAdministrador/CrearSucursal.php';
}

if(isset($_POST['btn_Crear_Caja'])){
    
    require_once __DIR__.'/../../vista/VistasAdministrador/CrearCaja.php';
}

if(isset($_POST['btn_Registrar_Cajero'])){
    
    require_once __DIR__.'/../../vista/VistasAdministrador/RegistrarCajero.php';
}

if(isset($_POST['btn_Asignar_Cajero'])){
    
    require_once __DIR__.'/../../vista/VistasAdministrador/AsignarCajero.php';
}

if(isset($_POST['btn_Reporte'])){
    
    require_once __DIR__.'/../../vista/VistasAdministrador/Reporte.php';
}

if(isset($_POST['btn_Eliminar_Cuenta'])){
    
    require_once __DIR__.'/../../vista/VistasAdministrador/Eliminar_Cuenta.php';
}


if(isset($_POST['btn_Realizar_Lista'])){

    if($TipoDeLista == "Cajeros"){
        
        
        $sql = "SELECT count(id_sucursal) from sucursales";
        $longitud = ConectarBD::send("bd_banco", $sql)->fetch_row()[0];
        
        for( $i = 1; $i<=$longitud ;$i++){
                
            $sql = "SELECT nombre from sucursales WHERE id_sucursal = $i";          //Listamos a loscajeros por su sucrusal poniendo
            $NombreSucursal = ConectarBD::send('bd_banco', $sql)->fetch_row()[0];   // El titulo de lasucursal en cada tabla

            Mostrar::CajerosPorSucursal($admin->ListarCajeros($i),$NombreSucursal);
        }
        $cajeros = $admin->ListarCajerosInacitivos();
        Mostrar::Cajeros($cajeros,"Cajeros inactivos");
    }
    if($TipoDeLista == "Cajas"){
        
        $sql = "SELECT count(id_sucursal) from sucursales";
        $longitud = ConectarBD::send('bd_banco', $sql)->fetch_row()[0];
        
        for( $i = 1; $i<=$longitud ;$i++){
            
            $sql = "SELECT nombre from sucursales WHERE id_sucursal = $i";          //Listamos a loscajeros por su sucrusal poniendo
            $NombreSucursal = ConectarBD::send('bd_banco', $sql)->fetch_row()[0];   // El titulo de lasucursal en cada tabla

            Mostrar::CajasPorSucursal( $admin->ListarCajas($i) ,$NombreSucursal);
        }
    }
    if($TipoDeLista == "Sucursales"){
        $sql = "SELECT count(id_dpto) from departamentos";
        $longitud = ConectarBD::send('bd_banco', $sql)->fetch_row()[0];
        
        for( $i = 1; $i<=$longitud ;$i++){
            
            $sql = "SELECT nombre from departamentos WHERE id_dpto = $i";          //Listamos a loscajeros por su sucrusal poniendo
            $NombreDepartamento = ConectarBD::send('bd_banco', $sql)->fetch_row()[0];   // El titulo de lasucursal en cada tabla

            Mostrar::SucursalesPorDepartamento( $admin->ListarSucursales($i) ,$NombreDepartamento);
        }
    }
}

