<?php
    require_once('../modelos/login.php');
    $nuevo_usuario = new ingresar();
    $datos = $nuevo_usuario->getIngreso();
    require_once('menu.php');
?>