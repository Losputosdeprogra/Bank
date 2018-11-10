<?php

if (isset($_POST['btn_cliente'])) {
     require_once __DIR__ . '/../vista/VistasCliente/Clientelogin.php';     
}

if (isset($_POST['btn_cajero'])) {
       require_once __DIR__ . '/../vista/VistasCajero/CajeroLogin.php'; 
}

if (isset($_POST['btn_administrador'])) {
    require_once __DIR__.'/../vista/VistasAdministrador/AdministradorLogin.php';
}

