<?php

class Mostrar {
    public static function Cuentas($cuentas="") {
    echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
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
    echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
    echo "<caption><h1>Lista de transacciones</caption>";
    echo "<tr>";
    echo "<th>Id Tansaccion</th>";
    echo "<th>Fecha</th>";
    echo "<th>Hora</th>";
    echo "<th>Tipo</th>";
    echo "<th>Cuenta origen</th>";
    echo "<th>Cuenta destino</th>";
    echo "<th>Monto</th>";
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
        echo "</tr>";
    }
    echo " </table>";
    }
    
    
    public static function Reporte($reporte){
    
        echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
        echo "<caption><h1>Reporte</caption>";
        echo "<tr>";
        echo "<th>Id_Transaccion</th>";
        echo "<th>Fecha</th>";
        echo "<th>Hora</th>";
        echo "<th>Tipo</th>";
        echo "<th>Cuenta origen</th>";
        echo "<th>Cuenta destino</th>";
        echo "<th>Monto</th>";
        echo "<th>id Caja</th>";
        echo "<th>Cajero (id)</th>";
        echo "<th>Sucursal (id)</th>";
        echo "</tr>";

        while ($fila = $reporte->fetch_row()) {
            
            $sql1 = "SELECT nombre from sucursales WHERE id_sucursal = $fila[9]";
            $nombreSucursal = ConectarBD::send("bd_banco", $sql1)->fetch_row()[0];
            
            $sql2 = "SELECT nombre from cajeros WHERE id_Cajero = $fila[8]";
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
            echo "<td> <center>".$nombreCajero."($fila[8])</td>";
            echo "<td> <center>".$nombreSucursal."($fila[9])</td>";
            echo "</tr>";
        }
        echo " </table>";
    }
    public function Cajas($cajas) {
        echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
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
        echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
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
        echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
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
        echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
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
        echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
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
        echo "<table width='75%' border='2' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
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