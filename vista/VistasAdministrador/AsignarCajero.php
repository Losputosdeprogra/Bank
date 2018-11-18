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
                <center><h1>Asignar cajero</h1></center>

                <form method="POST" action="../../controlador/ControladoresAdministrador/AdministradorAsignarCajaControlador.php" >

                    <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input type="text" name="nombre" class="form-control" id="nombre">
                    </div>    

                    <div class="form-group">
                        <label for="id_caja">Id_caja: </label>
                        <input type="text" name="id_caja" class="form-control" id="id_caja">
                    </div>  


                    <center>
                        <input type="submit" value="Asignar" class="btn btn-primary" name="btn_Asignar_Caja">
                    </center>

              </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>






