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

            <br><br><br><br>
            <center><h1>Registrate como cajero</h1></center>

            <form method="POST" action="../controlador/ControladoresCajero/CajeroLoginControlador.php" >

                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" class="form-control" id="nombre">
                </div>    

                <div class="form-group">
                    <label for="contrasena">Contraseña: </label>
                    <input type="text" name="contrasena" class="form-control" id="contrasena">
                </div>  


                <center>

                  <input type="submit" value="Ingresar" class="btn btn-primary" name="btn_ingresar">
                  
                </center>

            </form>


            </div>

            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>
