
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
                <center><h1>Interfaz de administrador</h1></center>
                
                <?php 
                    print "<h2><br><br><br><p>Bienvenido $_SESSION[nombre]</h2><br>";
                ?>

                <form method="POST" action="../../controlador/ControladoresAdministrador/AdministradorInterfazControlador.php" >

                    <fieldset>
                        <legend>¿Qué deceas hacer?</legend>
                        <center>
                            <input type="submit" value="Crear sucursal" class="btn btn-primary" name="btn_Crear_Sucursal"></br></br>
                            <input type="submit" value="Crear caja" class="btn btn-success" name="btn_Crear_Caja"></br></br>
                            <input type="submit" value="Registrar cajero" class="btn btn-danger" name="btn_Registrar_Cajero"></br></br>
                            <input type="submit" value="Asignar cajero" class="btn btn-info" name="btn_Asignar_Cajero"></br></br>
                            <input type="submit" value="Reporte" class="btn btn-primary" name="btn_Reporte"></br></br>
                           
                        </center>
                    </fieldset>
                </form>
            </div>
            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>