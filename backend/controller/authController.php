<?php

if($_POST){
	$data = [];
	$usuario = filter_input(INPUT_POST, 'usuario');
	$contrasena = filter_input(INPUT_POST, 'contrasena');
	$tipo = filter_input(INPUT_POST, 'tipo');

	switch($tipo){
		case 'usuario':

			require_once("../bo/usuariosBo.php");
			require_once("../domain/usuarios.php");

			$usuariosBo = new UsuariosBo();
			$usuarios = Usuarios::createNullUsuarios();

			if($usuario != null && $contrasena != null){
				$usuarios->setUsuario($usuario);
				$usuarios->setcontrasenaUsuario($contrasena);

				if($usuariosBo->login($usuarios)){
					$data['status'] = 1;
					$data['tipo'] = "usuario";
				}else{
					$data['status'] = 0;
				}
			}

			break;

		case 'chofer':

			require_once("../bo/choferesBo.php");
			require_once("../domain/choferes.php");

			$choferesBo = new ChoferesBo();
			$choferes = Choferes::createNullChoferes();

			if($usuario != null && $contrasena != null){
				$choferes->setUsuario($usuario);
				$choferes->setContraseña($contrasena);

				if($choferesBo->login($choferes)){
					$data['status'] = 1;
					$data['tipo'] = "chofer";
				}else{
					$data['status'] = 0;
				}
			}

			break;

		case 'administrador':

			require_once("../bo/administradoresBo.php");
			require_once("../domain/administradores.php");

			$administradoresBo = new AdministradoresBo();
			$administradores = Administradores::createNullAdministradores();

			if($usuario != null && $contrasena != null){
				$administradores->setUsuarioAdmin($usuario);
				$administradores->setcontrasenaAdmin($contrasena);

				if($administradoresBo->login($administradores)){
					$data['status'] = 1;
					$data['tipo'] = "administrador";
				}else{
					$data['status'] = 0;
				}
			}

			break;
	}

	die(json_encode($data));
}