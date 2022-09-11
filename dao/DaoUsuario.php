<?php

require_once('./clase/Usuario.php');

class DaoUsuario
{

    public function getUsuario()
    {
        //defino usuarios de ejemplo para mostrar en la api
        $usuarios = array();

        $usuario1 = new Usuario(1, 'user1','123456',24568448,'Pedro','Lopez','plopez@gmail.com');
        $usuario2 = new Usuario(2, 'user2','234567',24568449,'Pepe','Lopez','pelopez@gmail.com');
        $usuario3 = new Usuario(3, 'user3','345678',24568440,'José','Lopez','jolopez@gmail.com');
        $usuarios[] = $usuario1;
        $usuarios[] = $usuario2;
        $usuarios[] = $usuario3;

        return $usuarios;
    }


    public function updateUsuario($idusuario,$user,$pass,$dni,$nombre,$apellido,$mail)
    {
        $daoUsuario=new DaoUsuario();
        $usuarios=$daoUsuario->getUsuario();

        foreach ($usuarios as $u) {
            if($u->idusuario==$idusuario){
                $u->user=$user;
                $u->pass=$pass;
                $u->dni=$dni;
                $u->nombre=$nombre;
                $u->apellido=$apellido;
                $u->mail=$mail;
            }
        }

        return $usuarios;
    }

    public function createUsuario($user,$pass,$dni,$nombre,$apellido,$mail)
    {
        $daoUsuario=new DaoUsuario();
        $usuarios=$daoUsuario->getUsuario();

        $usuario = new Usuario(4, $user,$pass,$dni,$nombre,$apellido,$mail);
        $usuarios[] = $usuario;

        return $usuarios;
    }

    public function deleteUsuario($idusuario)
    {
        $daoUsuario=new DaoUsuario();
        $usuarios=$daoUsuario->getUsuario();

        $i=0;
        $posicion=-1;
        foreach ($usuarios as $u) {
            if($u->idusuario==$idusuario){
                $posicion=$i;
            }
            $i++;
        }
        if ($posicion>=0){
            unset($usuarios[$posicion]);
        }

        return $usuarios;
    }
}
