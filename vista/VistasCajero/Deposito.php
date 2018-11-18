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

            <center><h1>Deposito</h1></center>

            <form method="POST" action="../../controlador/ControladoresCajero/DepositoControlador.php" >

                
                <div class="form-group">
                    <label for="monto"> Numero de Cuenta: </label>
                    <input type="number" name="cuentas" class="form-control" id="id_cuenta">
                </div> 
                <div class="form-group">
                    <label for="monto"> Monto: </label>
                    <input type="number" name="monto" class="form-control" id="monto">
                </div> 
                <div class="form-group">
                    <input type="radio" name="moneda" value="1"> Dolares  
                    <input type="radio" name="moneda" value="0"> Bolivianos <br>
                    
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

