<?php
	class Usuario{
        public $idusuario;
        public $user;
        public $pass;
        public $dni;
        public $nombre;
        public $apellido;
        public $mail;
                                
        function __construct($idusuario,$user,$pass,$dni,$nombre,$apellido,$mail) {
            $this->idusuario = $idusuario;
            $this->user = $user;
            $this->pass = $pass;
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->mail = $mail;
        }
    }
?>