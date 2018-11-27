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
                <center><h1>Eliminar Cuenta</h1></center>

                <form method="POST" action="../../controlador/ControladoresAdministrador/EliminarCuentaControlador.php" >

                    <div class="form-group">
                        <label for="cuenta">Cuenta </label>
                        <input type="number" name="cuenta" class="form-control" id="cuenta">
                    </div> 
                    
                    <div class="form-group">
                        <label for="nombre">Nombre del Cliente: </label>
                        <input type="text" name="nombre" class="form-control" id="nombre">
                    </div>    

                    <div class="form-group">
                        <label for="ci_nit">NIT_CI: </label>
                        <input type="number" name="nit_ci" class="form-control" id="nit_ci">
                    </div>  
                    

                    <center>
                        <input type="submit" value="Eliminar" class="btn btn-primary" name="btn_Eliminar_Cuenta">
                    </center>

              </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>

