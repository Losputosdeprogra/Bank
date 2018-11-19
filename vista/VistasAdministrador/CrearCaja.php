<html>
    <?php
$listadesucursales="";
$sql = "select id_sucursal,nombre from sucursales ";
$rows = ConectarBD::send("bd_banco", $sql);
while($filas= $rows->fetch_row()){
        $listadesucursales .= " <option value='$filas[0]'>$filas[0] ($filas[1]) </option>";
    }


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
                <center><h1>Crea una nueva caja</h1></center>

                <form method="POST" action="../../controlador/ControladoresAdministrador/AdministradorCrearCajaControlador.php" >

                    <div class="form-group">
                        <label for="numero">Numero: </label>
                        <input type="text" name="numero" class="form-control" id="numero">
                    </div>    

                    <div class="form-group">
                        <label for="combobox">Id_sucursal </label>
                        <select  name="id_sucursal" class="form-control" id="id_sucursal">
                         <?php 
                                echo $listadesucursales ;
                            ?>
                        </select>
                    </div>  


                    <center>
                        <input type="submit" value="Crear" class="btn btn-primary" name="btn_Crear_Caja">
                    </center>

              </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>




