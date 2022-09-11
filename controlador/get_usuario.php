<?php
    if (file_exists('dao/DaoUsuario.php')){
        require_once('dao/DaoUsuario.php');
    }else{
        require_once('../dao/DaoUsuario.php');
    }

    $usuario = new DaoUsuario();
    $usuarios = $usuario->getUsuario();
    $records = $usuarios;
    
?>