<?php
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
define( "direccion" , __DIR__ . '/../../vista/VistasCajero/');
echo "<html lang='es'>" ;
session_start();


$nit  = $_POST['nit_ci'];

$Cliente = new ClienteModelo();


if($Cliente->VerificarCi_Nit($nit)){    //Validamos que existe un cliente con ese nit 
    
    $_SESSION['nit_ci'] = $nit;
    $_SESSION["id_cliente"] = $Cliente->ObtenerIDconNit($nit);
    
    if (isset($_POST['btn_Realizar_extracto'])) {
        if($nit ){
            
            $sql1 = "SELECT nombre from clientes WHERE nit_ci ='$nit' ";
            $_SESSION["nombre"]= ConectarBD::send("bd_usuario", $sql1)->fetch_row()[0];
            require_once constant("direccion").'RealizarExtracto.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
    }
    
    if (isset($_POST['btn_retiro'])) {
        
        if($nit ){

            require_once constant("direccion").'Retiro.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
    }

    if (isset($_POST['btn_transferencia'])) {
        if($nit ){

            require_once constant("direccion").'Transferencia.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
    }

    if (isset($_POST['btn_Crear_cuenta'])) {
        if($nit ){

            require_once constant("direccion").'CrearCuenta.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
        
    }
    if (isset($_POST['btn_Eliminar_cuenta'])) {
        if($nit ){

            require_once  ("direccion").'EliminarCuenta.php';
        }else{
        echo "<br><br><br><br><center> Debe introducir el nit del cliente</center>";
        }
    }
    if(isset($_POST['btn_deposito'])){

        require_once constant("direccion").'DepositoCliente.php';
    }
     
}else{
    
    if (isset($_POST['btn_Registrar_cliente'])) {

        require_once constant("direccion").'RegistrarCliente.php';
    }

    if(isset($_POST['btn_deposito'])){
        
        require_once constant("direccion").'DepositoExterno.php';
    }
    
}

 if (isset($_POST['btn_encontrar'])) {
   
 
            $max = 0;
            $nombre = "";
            $cuenta;
            $aux2 = 0;
            $sql2 = "select * from clientes";
            $b = ConectarBD::send("bd_usuario", $sql2);
            while($tablacliente =$b->fetch_row())
            {
                $sql3 = "select * from cuentas where id_cliente = $tablacliente[0]";
                $c = ConectarBD::send("bd_finanzas", $sql3);
                $aux2 =0;
                while($tablacuentas = $c->fetch_row())
                {
                    $sql4 = "select count(id_trans) from transacciones where cuenta_origen = $tablacuentas[0] or cuenta_destino = $tablacuentas[0]";
                    $d = ConectarBD::send("bd_finanzas", $sql4);
                    $aux = $d->fetch_row()[0];
                    $aux2 = $aux2 + $aux;
                }
                if ($aux2>$max)
                    {
                        $max = $aux2; 
                        $nombre = "$tablacliente[1]";
                    }
            }
             
             echo "cantidad de transacciones". $max ."<br>"; 
     
             echo "cliente". $nombre;
             
             
             
    }

    