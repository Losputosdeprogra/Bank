
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

                <center><h1>Realizar un reporte</h1></center>
                
                <?php 
                    print "<h2><br><p>Bienvenido $_SESSION[nombre]</h2>";
                ?>

                
                <form method="POST" action="../../controlador/ControladoresAdministrador/AdministradorRealizarReporte.php" >

 
                    
                    <br>
                    <legend>Elija de quien quieres hacer reporte:</legend>
                    <input type="radio" name="Boton_radio" value="Banco" checked>Banco
                    <input type="radio" name="Boton_radio" value="Sucursal">Sucursal
                    <input type="radio" name="Boton_radio" value="Cajero">Cajero
                    <input type="radio" name="Boton_radio" value="Caja">Caja
                    <br><br>
                    
                    <div class="form-group">
                        <label for="FechaInicio">Fecha de inicio </label>
                        <input type="date" name="FechaInicio" class="form-control" id="FechaInicio" placeholder="dd/mm/yyy">
                    </div>

                    <div class="form-group">
                        <label for="FechaFinal">Fecha final </label>
                        <input type="date" name="FechaFinal" class="form-control" id="FechaFinal" placeholder="dd/mm/yyy">
                    </div>  
                    
                    <div class="form-group">
                        <label for="id">id </label>
                        <input type="text" name="id" class="form-control" id="id" value="1" >
                    </div>
                    

                    <center>

                      <input type="submit" value="Solicitar extracto" class="btn btn-primary" name="btn_Realizar_Reporte">
                      <input type="submit" value="Solicitar extracto general" class="btn btn-primary" name="btn_Realizar_Reporte_General">
                      
                      
                    </center>

                </form>
            </div>
            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
        
    </body>
</html>