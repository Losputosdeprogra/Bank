<?php

echo "<html lang='es'>" ;
require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
session_start();                 //Creamos una sesion para pasar datos entre diferentes archivos php

$nombre      = $_POST['nombre'];
$contrasena  = $_POST['contrasena'];

$_SESSION["nombre"]= $nombre;   //Esta variable sera enviada al ClienteInterfazControlador
$sql = "SELECT id_cliente from clientes WHERE nombre = '$nombre'";
$_SESSION["id_cliente"] = ConectarBD::send("bd_usuario", $sql)->fetch_row()[0];


$Cliente = new ClienteModelo();
$Cliente->setNombre($nombre);
$Cliente->setContrasena($contrasena);


if (isset($_POST['btn_ingresar'])) {
    
    if($Cliente->verificarUsuario()){
        
        require_once  __DIR__ . '/../../vista/VistasCliente/ClienteInterfaz.php';
    }else{
        require_once  __DIR__ . '/../../vista/VistasCliente/Clientelogin.php';      //Vuelve a mostrar la pagina para loguearce
        echo "<br><center>Usuario o contraseña incorrecto. Intenta de nuevo.";
    }
}
