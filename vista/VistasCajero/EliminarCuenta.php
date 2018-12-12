<!DOCTYPE html>
<?php
    $ListaDeCuentas = "";
    
    $idCliente = $_SESSION["id_cliente"];
    $sql = "SELECT id_cuenta from cuentas WHERE id_cliente = '$idCliente' ";
    $rows = ConectarBD::send("bd_finanzas", $sql);
    while($filas= $rows->fetch_row()){
        $ListaDeCuentas .= " <option value='".$filas[0]."'>".$filas[0]."</option>";
    }
    //Aqui estamos consiguiendo los numeros de cuenta que van en el combobox
?>
<html>
    <head>
        <meta charset="UTF-8">
       <title>BancoPX</title>
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
            <center><h1>Eliminar un cuenta del cliente</h1></center>

            <form method="POST" action="../../controlador/ControladoresCajero/EliminarCuentaControlador.php" >

                <div class="form-group">
                    <label for="id_cuenta">Tipo de cuenta: </label>
                    <select type="text" name="id_cuenta" class="form-control" id="id_cuenta">
                        <?php
                            echo $ListaDeCuentas;
                        ?>
                    </select>
                </div>    

                
                <center>
                    <input type="submit" value="Eliminar" class="btn btn-primary" name="btn_Eliminar">
                </center>
                
            </form>
            

        </div>

            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>
