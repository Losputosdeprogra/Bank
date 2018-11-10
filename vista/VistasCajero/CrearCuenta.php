<!DOCTYPE html>

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
            <center><h1>Crear una cuenta</h1></center>

            <form method="POST" action="../../controlador/ControladoresCajero/CrearCuentaControlador.php" >

                <div class="form-group">
                    <label for="id_cliente">id del dueño de la cuenta: </label>
                    <input type="number" name="id_cliente" class="form-control" id="id_cliente">
                </div>  

                <div class="form-group">
                    <label for="tipo_cuenta">Tipo de cuenta: </label>
                    <select type="number" name="tipo_cuenta" class="form-control" id="tipo_cuenta">
                        <option value='Cuenta de ahorros'>Cuenta de ahorros</option>
                        <option value='Cuenta corriente'>Cuenta corriente</option>
                    </select>
                </div>    

                <div class="form-group">
                    <label for="moneda">Moneda</label>
                    <select type="text" name="moneda" class="form-control" id="moneda">
                        <option value="Bolivianos">Bolivianos</option>
                        <option value="Dolares">Dolares</option>
                    </select>
                </div>    
                
                <center>
                    <input type="submit" value="Crear cuenta" class="btn btn-primary" name="btn_Crear_cuenta">
                </center>
            </form>
            

        </div>

            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>
