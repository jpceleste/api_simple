<?php
    if (file_exists('dao/DaoUsuario.php')){
        require_once('dao/DaoUsuario.php');
    }else{
        require_once('../dao/DaoUsuario.php');
    }

    $filtros = explode('&', $filtro);
    for ($i = 0; $i < sizeof($filtros); $i++) {
        $filtroitem = explode('=', $filtros[$i]);
        if ($filtroitem[0] == 'idusuario') {
            $idusuario = $filtroitem[1];
        }
        if ($filtroitem[0] == 'user') {
            $user = $filtroitem[1];
        }
        if ($filtroitem[0] == 'pass') {
            $pass = $filtroitem[1];
        }
        if ($filtroitem[0] == 'dni') {
            $dni = $filtroitem[1];
        }
        if ($filtroitem[0] == 'nombre') {
            $nombre = $filtroitem[1];
        }
        if ($filtroitem[0] == 'apellido') {
            $apellido = $filtroitem[1];
        }
        if ($filtroitem[0] == 'mail') {
            $mail = $filtroitem[1];
        }
    }

    if(isset($idusuario) && isset($user) && isset($pass) && isset($dni) && isset($nombre) && isset($apellido) && isset($mail)){
        $usuario = new DaoUsuario();
        $usuarios = $usuario->updateUsuario($idusuario,$user,$pass,$dni,$nombre,$apellido,$mail);
        $records = $usuarios;
    }else{
        $status = "error";
        $message = "Los parámetros idusuario, user, pass, dni, nombre, apellido y mail son requeridos.";
    }
  
    
?>