<?php

require_once 'controlador/Controlador.php';

$controlador = new Controlador();

$controlador->load();

$controlador->render();

