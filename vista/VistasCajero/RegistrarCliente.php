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

            <center><h1>Registrar a un nuevo cliente</h1></center>

            <form method="POST" action="../../controlador/ControladoresCajero/RegistrarClienteControlador.php" >

                <legend>Ingresa los datos del cliente</legend>
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" class="form-control" id="nombre">
                </div>  
                
                <div class="form-group">
                    <label for="telefono">Telefono: </label>
                    <input type="text" name="telefono" class="form-control" id="telefono">
                </div> 
                
                <div class="form-group">
                    <label for="email">Correo electronico: </label>
                    <input type="text" name="email" class="form-control" id="email">
                </div> 
                
                <div class="form-group">
                    <label for="direccion">Direccion: </label>
                    <input type="text" name="direccion" class="form-control" id="direccion">
                </div> 
                
                <div class="form-group">
                    <label for="id_nit">Nit o carnet: </label>
                    <input type="text" name="id_nit" class="form-control" id="id_nit">
                </div> 
                
                <div class="form-group">
                    <label for="contrasena">Contraseña: </label>
                    <input type="number" name="contrasena" class="form-control" id="c">
                </div>        
                
                <legend>Ingresa los datos de la primera cuenta del cliente</legend>
                
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
                    <input type="submit" value="Registrar cliente" class="btn btn-primary" name="btn_Registrar_cliente">
                </center>
                
            </form>
            

        </div>

            <!-- TERMINA LA COLUMNA -->
            <div class="col-md-4"></div>
        </div>
    </body>
</html>
