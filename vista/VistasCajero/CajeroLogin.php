<!DOCTYPE html>
<?php
    require_once __DIR__ . '/../../modelo/ConectarBD.php';
    $CajerosActivos = "";
    
    $sql = "SELECT nombre from cajeros WHERE id_caja != 0";
    $rows = ConectarBD::send('bd_usuario', $sql);
    while($filas= $rows->fetch_row()){
        $CajerosActivos .= " <option value='$filas[0]'>".$filas[0]."</option>";
    }
    //Aqui estamos consiguiendo los numeros de cuenta que van en el combobox
?>
<html>
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
            <center><h1>Registrate como cajero</h1></center>

            <form method="POST" action="../controlador/ControladoresCajero/CajeroLoginControlador.php" >

                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <select name="nombre" class="form-control" id="nombre">
                            <?php 
                                echo $CajerosActivos;
                            ?>
                        </select>
                </div>    

                <div class="form-group">
                    <label for="contrasena">Contraseña: </label>
                    <input type="text" name="contrasena" class="form-control" id="contrasena">
                </div>  


                <center>

                  <input type="submit" value="Ingresar" class="btn btn-primary" name="btn_ingresar">
                  <br><br><center><p>*Solo aparecen los nombre de los cajeros activos</p></center>
                </center>

            </form>


            </div>

            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>
