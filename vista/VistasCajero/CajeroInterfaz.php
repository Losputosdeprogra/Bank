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
                <center><h1>Interfaz de cajero</h1></center>
                <br><br>


                <form method="POST" action="../../controlador/ControladoresCajero/CajeroInterfazControlador.php" >

                    <fieldset>
                        <legend>Operaciones con cuentas</legend>

                            
                            <div class="form-group">
                                <label for="nit_ci" >C.I. o NIT del cliente: </label><br>
                                <input type="number" name="nit_ci" class="form-control" value="0">
                            </div>
                        
                        <center>
                            <input type="submit" value="Realizar extracto a un cliente" class="btn btn-primary" name="btn_Realizar_extracto"></br></br>
                            <input type="submit" value="Deposito" class="btn btn-success" name="btn_deposito">  
                            <input type="submit" value="Retiro" class="btn btn-success" name="btn_retiro">  
                            <input type="submit" value="Transferencia" class="btn btn-success" name="btn_transferencia"><br><br>
                        </center> 
                        <p>*Para hacer un deposito a cualquier cuenta del banco no llene el campo C.I</p><br>
                            
                        <legend>Operaciones generales</legend>
                        <center>
                            <input type="submit" value="Crear cuenta nueva" class="btn btn-danger" name="btn_Crear_cuenta"></br></br>
                            <input type="submit" value="Registrar nuevo cliente" class="btn btn-info" name="btn_Registrar_cliente">
                        </center>
                        
                        
                        <br>
                        
                    </fieldset>
                </form>
            </div>
            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>