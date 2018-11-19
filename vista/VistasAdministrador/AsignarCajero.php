<html>
    <?php
    
    $listadenombre= "";
    $sql2 = "select nombre, if(id_caja != 0,'Activo','Inactivo') from cajeros";
    $rows2 = ConectarBD::send("bd_usuario", $sql2);
    while($filas = $rows2->fetch_row()) {

        $listadenombre .= " <option value='".$filas[0]."'>$filas[0] ($filas[1])</option>";
    }
    
    
    $listadecajas= "";
    $sql = "SELECT id_caja, if( cajas.id_caja IN(SELECT cajeros.id_caja FROM bd_usuario.cajeros) ,'Ocupado','Libre') FROM cajas";
    $rows = ConectarBD::send("bd_banco", $sql);
 
   
    while($filas = $rows->fetch_row()) {

        $listadecajas .= " <option value='".$filas[0]."'>".$filas[0]." ($filas[1]) "."</option>";
    }
    $listadecajas .= "<option value = '0'>0 (Desasignar cajero)</option>";
    
    ?>
    <head>
       <meta charset="UTF-8">
       <title>BancoPX<</title>
       <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  crossorigin="anonymous">

       <!-- Optional theme -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"  crossorigin="anonymous">

       <!-- Latest compiled and minified JavaScript -->
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    </head>
    
    <body>

        <div class="row">
          <div class="col-md-4"></div>

        <!-- INICIA LA COLUMNA -->

            <div class="col-md-4">

                <br><br><br><br>
                <center><h1>Asignar cajero</h1></center>

                <form method="POST" action="../../controlador/ControladoresAdministrador/AdministradorAsignarCajaControlador.php" >

                    <div class="form-group">
                        <label for="combobox">Nombre: </label>
                        <select name="nombre" class="form-control" id="nombre">
                            <?php 
                                echo $listadenombre;
                               ?>
                        </select>
                    </div>    

                    <div class="form-group">
                        <label for="combobox">Id_caja: </label>
                        <select  name="id_caja" class="form-control" id="id_caja">
                               <?php 
                                echo $listadecajas;
                               ?>
                        </select>
                    </div>  

                    <br>
                    <center>
                        <input type="submit" value="Asignar" class="btn btn-primary" name="btn_Asignar_Caja">
                    </center><br>
                    
                    <p>*Para liberar una caja elija la caja 0, esto hara que tanto la caja como el cajero queden libres</p>

              </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>






