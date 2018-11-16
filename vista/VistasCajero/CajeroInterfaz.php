<!DOCTYPE html>

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
                <center><h1>Interfaz de cajero</h1></center>
                
                <?php 
                    print "<h2><p>Bienvenido $_SESSION[nombre]</h2><br>";
                ?>

                <form method="POST" action="../../controlador/ControladoresCajero/CajeroInterfazControlador.php" >

                    <fieldset>
                        <legend>Registra los datos del cliente</legend>
                        <center>
                            
                            <div class="form-group">
                                <label for="nombre_cliente" style="font-family: monospace ; font-size: medium">Nombre del Cliente: </label><br>
                                <input type="text" name="nombre_cliente" class="form-control"> 
                            </div>
                            <div class="form-group">
                                <label for="nit_ci" style="font-family: monospace">C.I. / NIT: </label><br>
                                <input type="number" name="nit_ci" class="form-control"><br><br>
                            </div>
                            
                            <input type="submit" value="Realizar extracto" class="btn btn-primary" name="btn_Realizar_extracto"></br></br>
                            <input type="submit" value="Deposito" class="btn btn-success" name="btn_deposito">  
                            <input type="submit" value="Retiro" class="btn btn-success" name="btn_retiro">  
                            <input type="submit" value="Transferencia" class="btn btn-success" name="btn_tranferencia"><br><br>
                            
                            <input type="submit" value="Crear cuenta nueva" class="btn btn-danger" name="btn_Crear_cuenta"></br></br>
                            <input type="submit" value="Registrar nuevo cliente" class="btn btn-info" name="btn_Registrar_cliente">
                        
                        </center>
                    </fieldset>
                </form>
            </div>
            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>