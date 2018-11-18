<!DOCTYPE html>

<?php
    

    $ListaDeCuentas = "";
    
    $idCliente = $_SESSION['id_cliente'];
    $sql = "SELECT id_cuenta from cuentas WHERE id_cliente = $idCliente";
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

            <center><h1>TRANSFERENCIA</h1></center>

            <form method="POST" action="../../controlador/ControladoresCajero/TransferenciaControlador.php" >

                <strong>Numero de Cuenta Origen:      
                
                <select name="origen">
                    
                    <?php
                    echo $ListaDeCuentas;
                    ?>
                
                </select>
                <div class="form-group">
                    <label for="monto"> Numero de Cuenta Destino: </label>
                    <input type="number" name="destino" class="form-control" id="cuenta_destino">
                </div> 
                <div class="form-group">
                    <label for="monto"> Monto: </label>
                    <input type="number" name="monto" class="form-control" id="monto">
                </div> 
                <div class="form-group">
                    <input type="radio" name="moneda" value="Dolares"> Dolares  
                    <input type="radio" name="moneda" value="Bolivianos"> Bolivianos <br>
                    
                </div>
                    <center>
                <input type="submit" value="Realizar Deposito" class="btn btn-primary" name="btn_RealizarRetiro">
                    </center>
                
            </form>
            

        </div>

            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>

