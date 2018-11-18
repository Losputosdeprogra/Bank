<?php

require_once __DIR__ . '/UsuarioModelo.php';

class AdministradorModelo extends UsuarioModelo{
 
    private $TablaCorrespondiente = "administradores";
    
    public function verificarUsuario() {                         // Esta funcion revisa si el usuario existe en la tabla
        return parent::verificar($this->TablaCorrespondiente); // y sabe su contraseña.
    }                                                                           //Utiliza la vatiable TablaCorrespondeointe para realizar
                                                                              //la consulta en la tabla correcta

public function crear_sucursal($nombre,$id_dpto)
    {
       $sql  =  "INSERT INTO sucursales( nombre , id_dpto) VALUES ('$nombre',$id_dpto)";
       return ConectarBD::send("bd_banco", $sql);     
    }
    
    public function crear_caja($numero,$id_sucursal){
       $sql  =  "INSERT INTO cajas( numero , id_sucursal) VALUES ($numero,$id_sucursal)";
       return ConectarBD::send("bd_banco", $sql);     
    }
    
    public function registrar_cajero($nombre,$telefono,$email,$contrasena,$id_caja)
   {
         $sql  =  "INSERT INTO cajeros( nombre, telefono, email, contrasena, id_caja) VALUES ('$nombre',$telefono,'$email','$contrasena',$id_caja)";
       return ConectarBD::send("bd_usuario", $sql);     
    }
    
    public function asignar_caja($nombre, $id_caja){
        $sql = "UPDATE cajeros SET id_caja = $id_caja  WHERE nombre= '$nombre'";
        return ConectarBD::send("bd_usuario", $sql);     
    }
    
    public function ObtenerReporteBanco()
    {
        $sql="SELECT * From transacciones";
        return ConectarBD::send("bd_finanzas", $sql);
    }
    
 
    
    public function ObtenerReporteGeneral($id,$tabla)
    {
        $sql="SELECT * From transacciones WHERE $tabla='$id'";
        return ConectarBD::send("bd_finanzas", $sql);
    }
    
    
        public function ObtenerReporteBancoFecha($FechaInicio,$FechaFinal)
    {
    
        $sql="SELECT * From transacciones WHERE (fecha>='$FechaInicio')AND (fecha<='$FechaFinal')";
        return ConectarBD::send("bd_finanzas", $sql);
    }
    
       public function ObtenerReporteGeneralFecha($id,$tabla,$FechaInicio,$FechaFinal)
    {
        $sql="SELECT * From transacciones WHERE $tabla='$id' AND((fecha>='$FechaInicio')AND (fecha<='$FechaFinal'))";
        return ConectarBD::send("bd_finanzas", $sql);
    }
    
}    


