<?php

require_once __DIR__.'/../../modelo/UsuariosModelo/AdministradorModelo.php';
$tipo=$_POST['Boton_radio'];
$FechaInicio=$_POST['FechaInicio'];
$FechaFinal=$_POST['FechaFinal'];
$id=$_POST['id'];


$obj=new AdministradorModelo();
if(isset($_POST['btn_Realizar_Reporte_General']))
    {
    if($tipo=='Banco')
    {
       $reporte=$obj->ObtenerReporteBanco();
       MostrarReporte($reporte);
    }
    
    if($tipo=='Sucursal')
    {
 
        $reporte=$obj->ObtenerReporteGeneral($id,'id_sucursal');
       MostrarReporte($reporte);
    }
                
    if($tipo=='Cajero')
    {
        $reporte=$obj->ObtenerReporteGeneral($id,'id_cajero');
       MostrarReporte($reporte);        
    }
                        
    if($tipo=='Caja')
    {
       $reporte=$obj->ObtenerReporteGeneral($id,'id_caja');
       MostrarReporte($reporte);     
    }    
    
}



if(isset($_POST['btn_Realizar_Reporte']))
{
    if($FechaInicio=="")
    { 
      echo'<br><br><br> Ingrese al menos fecha de inicio';      
    }
 else {
   
    if($FechaFinal=="")
    {
        $FechaFinal=$FechaInicio;
    }
    if($tipo=='Banco')
    {
       
       $reporte=$obj->ObtenerReporteBancoFecha($FechaInicio,$FechaFinal);
       MostrarReporte($reporte);
      
    }
    
    if($tipo=='Sucursal')
    {
 
        $reporte=$obj->ObtenerReporteGeneralFecha($id,'id_sucursal',$FechaInicio,$FechaFinal);
       MostrarReporte($reporte);
    }
                
    if($tipo=='Cajero')
    {
        $reporte=$obj->ObtenerReporteGeneralFecha($id,'id_cajero',$FechaInicio,$FechaFinal);
       MostrarReporte($reporte);        
    }
                        
    if($tipo=='Caja')
    {
       $reporte=$obj->ObtenerReporteGeneralFecha($id,'id_caja');
       MostrarReporte($reporte);     
    }    
    
 }
    
}



function MostrarReporte($reporte){
    
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
    echo "<th>id Cajero</th>";
    echo "<th>id Sucursal</th>";
    
    echo "</tr>";
    while ($fila = $reporte->fetch_row()) {
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
        echo "<td> <center>".$fila[9]."</td>";
        echo "</tr>";
    }
    echo " </table>";
        
    }
    

