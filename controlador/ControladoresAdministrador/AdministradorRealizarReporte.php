<?php

require_once __DIR__.'/../../modelo/UsuariosModelo/AdministradorModelo.php';
require_once __DIR__.'/../../modelo/Mostrar.php';
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
       Mostrar::Reporte($reporte);
    }
    
    if($tipo=='Sucursal')
    {
 
        $reporte=$obj->ObtenerReporteGeneral($id,'id_sucursal');
       Mostrar::Reporte($reporte);
    }
                
    if($tipo=='Cajero')
    {
        $reporte=$obj->ObtenerReporteGeneral($id,'id_cajero');
       Mostrar::Reporte($reporte);        
    }
                        
    if($tipo=='Caja')
    {
       $reporte=$obj->ObtenerReporteGeneral($id,'id_caja');
       Mostrar::Reporte($reporte);     
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
       Mostrar::Reporte($reporte);
      
    }
    
    if($tipo=='Sucursal')
    {
 
        $reporte=$obj->ObtenerReporteGeneralFecha($id,'id_sucursal',$FechaInicio,$FechaFinal);
       Mostrar::Reporte($reporte);
    }
                
    if($tipo=='Cajero')
    {
        $reporte=$obj->ObtenerReporteGeneralFecha($id,'id_cajero',$FechaInicio,$FechaFinal);
       Mostrar::Reporte($reporte);        
    }
                        
    if($tipo=='Caja')
    {
       $reporte=$obj->ObtenerReporteGeneralFecha($id,'id_caja');
       Mostrar::Reporte($reporte);     
    }    
    
 }
    
}


