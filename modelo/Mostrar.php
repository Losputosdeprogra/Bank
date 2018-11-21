<?php

class Mostrar {
    public static function Cuentas($cuentas="") {
    echo "<table style='font-family:Lucida Sans Typewriter' width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor=#A9D0F5>";
    echo "<caption><h1>Lista de tus cuentas</caption>";
    echo "<tr>";
    echo "<th>Id_cuenta</th>";
    echo "<th>Monto</th>";
    echo "<th>Tipo</th>";
    echo "<th>Moneda</th>";
    echo "</tr>";
    while ($fila = $cuentas->fetch_row()) {
        echo "<tr>";
        echo "<td> <center>".$fila[0]."</center></td>"; 
        echo "<td> <center>".$fila[1]."</td>";
        echo "<td> <center>".$fila[2]."</td>";
        echo "<td> <center>".$fila[3]."</td>";
        
        echo "</tr>";
    }
    echo " </table>";
    }
    
    public static function  Extracto($Transacciones="") {
        $credito=0;
        $debito=0;
         $cuenta=$_SESSION['id_cuenta'];
            $sql1 = "SELECT monto,moneda from cuentas WHERE id_cuenta =$cuenta ";
            $aux = ConectarBD::send("bd_finanzas", $sql1)->fetch_row();
            if ($aux[1]=="Bolivianos"){
                $moneda="Bolivianos";
                $sigla=" Bs";
            }else{
                $moneda="Dolares";
                $sigla=" USD";
            }
    echo "<table  style='font-family:Lucida Sans Typewriter' width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor=#A9D0F5>";
    echo "<caption><h1>Lista de transacciones</caption>";
    echo "<caption> Cliente: ".$_SESSION['nombre']."</caption>";
    echo "<caption>    Cuenta: ".$_SESSION['id_cuenta']."  Moneda:".$moneda."</caption>";
    echo "<tr>";
    echo "<th>Id Tansaccion</th>";
    echo "<th>Fecha</th>";
    echo "<th>Hora</th>";
    echo "<th>Tipo</th>";
    echo "<th>Cuenta origen</th>";
    echo "<th>Cuenta destino</th>";
    echo "<th>Credito</th>";  /////Aument, Recibe
    echo "<th>Debito</th>";   ////Disminuye, Manda
    echo "</tr>";
    
           
            
    while ($fila = $Transacciones->fetch_row()) {
        echo "<tr>";
        echo "<td> <center>".$fila[0]."</center></td>"; 
        echo "<td> <center>".$fila[1]."</td>";
        echo "<td> <center>".$fila[2]."</td>";
        echo "<td> <center>".$fila[3]."</td>";   ////tipo
        echo "<td> <center>".$fila[4]."</td>";  ///origen   retiro  menos
        echo "<td> <center>".$fila[5]."</td>";    ///destino   deposito mas
        
        
        
        
        /////validacion de moneda
        
        if($moneda=="Bolivianos" and $fila[7]=="Dolares"){
            $fila[6]=$fila[6]*7;
        }else{
            if($moneda=="Dolares" and $fila[7]=="Bolivianos"){
                $fila[6]=$fila[6]*(1/7);
            }
        }
        
        ////validacion de debito o credito
        if($fila[4]==$_SESSION['id_cuenta']){
            echo "<td> <center>". round($fila[6],2).$sigla."</td>";
            $credito=$credito+round($fila[6],2);
            echo "<td> <center>---------------</td>";
        }
        if($fila[5]==$_SESSION['id_cuenta']){
            $debito=$debito+round($fila[6],2);
            echo "<td> <center>---------------</td>";
            echo "<td> <center>". round($fila[6],2).$sigla."</td>";
        }
        echo "</tr>";
    }
    
        echo "<tr>";
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center><h4>Total:</td>";
        echo "<td> <center>".$credito.$sigla."</td>";
        echo "<td> <center>".$debito.$sigla."</td>";
        echo "</tr>";
    
        ////////Saldo Fila
        
        echo "<tr>";
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center></center></td>"; 
        echo "<td> <center><h4>SALDO</td>";
        echo "<td> <center><h4>".$aux[0].$sigla."</td>";
        echo "</tr>";
        
    echo " </table>";
    }
    //////////////////ESTA FUNCION ES PARA DEPOSITO EXTERNO
       public static function  DepositoExterno($Transacciones="") {
    echo "<table  style='font-family:Lucida Sans Typewriter' width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor=#A9D0F5>";
    echo "<caption><h1>Lista de transacciones</caption>";
    echo "<tr>";
    echo "<th>Id Tansaccion</th>";
    echo "<th>Fecha</th>";
    echo "<th>Hora</th>";
    echo "<th>Tipo</th>";
    echo "<th>Cuenta origen</th>";
    echo "<th>Cuenta destino</th>";
    echo "<th>Monto</th>";
    echo "<th>Moneda</th>";
    echo "</tr>";
    while ($fila = $Transacciones->fetch_row()) {
        echo "<tr>";
        echo "<td> <center>".$fila[0]."</center></td>"; 
        echo "<td> <center>".$fila[1]."</td>";
        echo "<td> <center>".$fila[2]."</td>";
        echo "<td> <center>".$fila[3]."</td>";
        echo "<td> <center>".$fila[4]."</td>";
        echo "<td> <center>".$fila[5]."</td>";
        echo "<td> <center>".$fila[6]."</td>";
        echo "<td> <center>".$fila[7]."</td>";
        echo "</tr>";
    }
    echo " </table>";
    }
    
    
    
    //////////////////////////////////////////
    
    public static function Reporte($reporte){
    
        echo "<table style='font-family:Lucida Sans Typewriter'  width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor=#A9D0F5>";
        echo "<caption><h1>Reporte</caption>";
        echo "<tr>";
        echo "<th>Id_Transaccion</th>";
        echo "<th>Fecha</th>";
        echo "<th>Hora</th>";
        echo "<th>Tipo</th>";
        echo "<th>Cuenta origen</th>";
        echo "<th>Cuenta destino</th>";
        echo "<th>Monto</th>";
        echo "<th>Moneda</th>";
        echo "<th>id Caja</th>";
        echo "<th>Cajero (id)</th>";
        echo "<th>Sucursal (id)</th>";
        echo "</tr>";

        while ($fila = $reporte->fetch_row()) {
            
            $sql1 = "SELECT nombre from sucursales WHERE id_sucursal = $fila[10]";
            $nombreSucursal = ConectarBD::send("bd_banco", $sql1)->fetch_row()[0];
            
            $sql2 = "SELECT nombre from cajeros WHERE id_Cajero = $fila[9]";
            $nombreCajero = ConectarBD::send("bd_usuario", $sql2)->fetch_row()[0];
            echo "<tr>";
            echo "<td> <center>".$fila[0]."</center></td>"; 
            echo "<td> <center>".$fila[1]."</td>";
            echo "<td> <center>".$fila[2]."</td>";
            echo "<td> <center>".$fila[3]."</td>";
            echo "<td> <center>".$fila[4]."</td>";
            echo "<td> <center>".$fila[5]."</td>";
            echo "<td> <center>".$fila[6]."</td>";
            echo "<td> <center>".$fila[7]."</td>";
            echo "<td> <center>".$fila[8]."</td>";
            echo "<td> <center>".$nombreCajero."($fila[9])</td>";
            echo "<td> <center>".$nombreSucursal."($fila[10])</td>";
            echo "</tr>";
        }
        echo " </table>";
    }
    public function Cajas($cajas) {
        echo "<table style='font-family:Lucida Sans Typewriter'  width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#D5DBDB'>";
        echo "<caption><h1>Reporte</caption>";
        echo "<tr>";
        echo "<th>Id_caja</th>";
        echo "<th>Numero</th>";
        echo "<th>Sucursal</th>";

        echo "</tr>";

        while ($fila = $cajas->fetch_row()) {
            echo "<tr>";
            echo "<td> <center>".$fila[0]."</center></td>"; 
            echo "<td> <center>".$fila[1]."</td>";
            echo "<td> <center>".$fila[2]."</td>";
            echo "</tr>";
        }
        echo " </table>";
    }
    public function Sucursales($Sucursales,$NombreDepartamento) {
        echo "<table  style='font-family:Lucida Sans Typewriter' width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#D5DBDB'>";
        echo "<caption><h1>$NombreDepartamento</caption>";
        echo "<tr>";
        echo "<th>Id Sucursal</th>";
        echo "<th>Nombre</th>";

        echo "</tr>";

        while ($fila = $Sucursales->fetch_row()) {
            echo "<tr>";
            echo "<td> <center>".$fila[0]."</center></td>"; 
            echo "<td> <center>".$fila[1]."</td>";
            echo "</tr>";
        }
        echo " </table>";
    }
    public function Cajeros($Cajeros,$titulo) {
        echo "<table  style='font-family:Lucida Sans Typewriter' width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#D5DBDB'>";
        echo "<caption><h1>$titulo</caption>";
        echo "<tr>";
        echo "<th>Id cajero</th>";
        echo "<th>Nombre</th>";
        echo "<th>Telefono</th>";
        echo "<th>Email</th>";
        echo "<th>Id caja</th>";
        echo "</tr>";

        while ($fila = $Cajeros->fetch_row()) {
            echo "<tr>";
            echo "<td> <center>".$fila[0]."</center></td>"; 
            echo "<td> <center>".$fila[1]."</td>";
            echo "<td> <center>".$fila[2]."</td>";
            echo "<td> <center>".$fila[3]."</td>";
            echo "<td> <center>".$fila[4]."</td>";
            echo "</tr>";
        }
        echo " </table>";
    }
    public function CajerosPorSucursal($Cajeros,$Sucursal) {
        echo "<table  style='font-family:Lucida Sans Typewriter' width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#D5DBDB'>";
        echo "<caption><h1>Sucursal $Sucursal</caption>";
        echo "<tr>";
        echo "<th>Id cajero</th>";
        echo "<th>Nombre</th>";
        echo "<th>Telefono</th>";
        echo "<th>Email</th>";
        echo "<th>Id caja</th>";
        echo "</tr>";

        while ($fila = $Cajeros->fetch_row()) {
            echo "<tr>";
            echo "<td> <center>".$fila[0]."</center></td>"; 
            echo "<td> <center>".$fila[1]."</td>";
            echo "<td> <center>".$fila[2]."</td>";
            echo "<td> <center>".$fila[3]."</td>";
            echo "<td> <center>".$fila[4]."</td>";
            echo "</tr>";
        }
        echo " </table>";
    }
    public function CajasPorSucursal($Cajas,$Sucursal) {
        echo "<table  style='font-family:Lucida Sans Typewriter' width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#D5DBDB'>";
        echo "<caption><h1>Sucursal $Sucursal</caption>";
        echo "<tr>";
        echo "<th>Id caja</th>";
        echo "<th>Numero</th>";
        echo "</tr>";

        while ($fila = $Cajas->fetch_row()) {
            echo "<tr>";
            echo "<td> <center>".$fila[0]."</center></td>"; 
            echo "<td> <center>".$fila[1]."</td>";
            echo "</tr>";
        }
        echo " </table>";
    }
    
    public function SucursalesPorDepartamento($Sucrusales,$Departamento) {
        echo "<table  style='font-family:Lucida Sans Typewriter' width='75%' border='3' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#D5DBDB'>";
        echo "<caption><h1>Sucursal $Departamento</caption>";
        echo "<tr>";
        echo "<th>Id Sucursal</th>";
        echo "<th>Nombre</th>";
        echo "</tr>";

        while ($fila = $Sucrusales->fetch_row()) {
            echo "<tr>";
            echo "<td> <center>".$fila[0]."</center></td>"; 
            echo "<td> <center>".$fila[1]."</td>";
            echo "</tr>";
        }
        echo " </table>";
    }
}