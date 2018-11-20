<?php
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
define( "direccion" , __DIR__ . '/../../vista/VistasCajero/');
echo "<html lang='es'>" ;
session_start();


$nit  = $_POST['nit_ci'];
$_SESSION['nit_ci'] = $nit;
$Cliente = new ClienteModelo();

    
    if (isset($_POST['btn_Realizar_extracto'])) {
        if($nit ){
            $_SESSION["id_cliente"] = $Cliente->ObtenerIDconNit($nit);
            $sql1 = "SELECT nombre from clientes WHERE nit_ci ='$nit' ";
            $_SESSION["nombre"]= ConectarBD::send("bd_usuario", $sql1)->fetch_row()[0];
            require_once constant("direccion").'RealizarExtracto.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
    }
    
    if (isset($_POST['btn_retiro'])) {
        if($nit ){
            $_SESSION["id_cliente"] = $Cliente->ObtenerIDconNit($nit);
            require_once constant("direccion").'Retiro.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
    }

    if (isset($_POST['btn_transferencia'])) {
        if($nit ){
            $_SESSION["id_cliente"] = $Cliente->ObtenerIDconNit($nit);
            require_once constant("direccion").'Transferencia.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
    }

    if (isset($_POST['btn_Crear_cuenta'])) {
        if($nit ){
            $_SESSION["id_cliente"] = $Cliente->ObtenerIDconNit($nit);
            require_once constant("direccion").'CrearCuenta.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
        
    }

    if (isset($_POST['btn_Registrar_cliente'])) {

        require_once constant("direccion").'RegistrarCliente.php';
        
    }

    if(isset($_POST['btn_deposito'])){
        if($nit!=0){
            $_SESSION["id_cliente"] = $Cliente->ObtenerIDconNit($nit);
            require_once constant("direccion").'DepositoCliente.php';
        }else{
            require_once constant("direccion").'DepositoExterno.php';
        }
    }


