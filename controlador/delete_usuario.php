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
    }

    if(isset($idusuario)){
        $usuario = new DaoUsuario();
        $usuarios = $usuario->deleteUsuario($idusuario);
        $records = $usuarios;
    }else{
        $status = "error";
        $message = "El parámetros idusuario es requerido.";
    }
  
    
?>