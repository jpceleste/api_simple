<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
//require 'vendor/autoload.php';

//Token de autenticación agregado en Header: Authorization Bearer [token]
$token = false;

//inicializo bandera para identificar si todos los parámetros llegan correctamente
$parametros = true;

//Inicializo variable de status
$status = "success";

//inicializo el arreglo de registros
$records = array();

//Inicializo variable de status
$message = "Respuesta Satisfactoria";

//inicializo los servicios disponibles
$servicios = array('get_usuario','update_usuario','delete_usuario','create_usuario');

//inicializo los servicios disponibles
$usuarios = array('admin', 'operador');

// Si el chequeo de JWT retorna error, corto la petición.
if ($status == 'success') {
	//chequeo parámetro servicio
	if (isset($_POST['servicio'])) {
		$servicio = $_POST['servicio'];

		//chequeo parámetro auditoria
		if (isset($_POST['auditoria'])) {
			$auditoria = $_POST['auditoria'];

			//chequeo parámetro usuario_auditoria
			if (isset($_POST['usuario_auditoria'])) {
				$usuario_auditoria = $_POST['usuario_auditoria'];

				//chequeo parámetro filtro
				if (isset($_POST['filtro'])) {
					$filtro = $_POST['filtro'];
				} else {
					$parametros = false;
					$status = "error";
					$message = "No está seteado el parámetro filtro";
					$filtro = "NO SETEADO";
				}
			} else {
				$parametros = false;
				$status = "error";
				$message = "No está seteado el parámetro usuario_auditoria";
				$usuario_auditoria = "NO SETEADO";
				$filtro = "NO SETEADO";
			}
		} else {
			$parametros = false;
			$status = "error";
			$message = "No está seteado el parámetro auditoria";
			$auditoria = "NO SETEADO";
			$usuario_auditoria = "NO SETEADO";
			$filtro = "NO SETEADO";
		}
	} else {
		$parametros = false;
		$status = "error";
		$message = "No está seteado el parámetro servicio";
		$servicio = "NO SETEADO";
		$auditoria = "NO SETEADO";
		$usuario_auditoria = "NO SETEADO";
		$filtro = "NO SETEADO";
	}

	if ($parametros) {
		//chequeo que el usuario_auditoria esté habilitado para consumir el servicio
		if (in_array($usuario_auditoria, $usuarios)) {
		//chequeo que el servicio solicitado esté definido
			if (in_array($servicio, $servicios)) {
				//Se discrimina la definición de cada servicio
				switch ($servicio) {
					case 'get_usuario':
						include 'controlador/get_usuario.php';
						break;
					case 'update_usuario':
						include 'controlador/update_usuario.php';
						break;
					case 'create_usuario':
						include 'controlador/create_usuario.php';
						break;
					case 'delete_usuario':
						include 'controlador/delete_usuario.php';
						break;
					default:
						$status = "error";
						$message = "El servicio $servicio no está definido (default)";
						break;
				}
			} else {
				$status = "error";
				$message = "El servicio $servicio no está definido";
			}
		} else {
			$status = "error";
			$message = "El usuario $usuario_auditoria no está habilitado para consumir el servicio solicitado";
		}
	}
}

//$records_temp = array();
$result = array(
	"status" => $status,
	"records" => $records,
	"message" => $message
);
//print_r($outputdata);
echo json_encode($result);
