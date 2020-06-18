<?php
	require_once '../includes/php/conexion.php';
	require_once '../includes/clases/Usuario.php';
	require_once '../includes/clases/Contacto.php';

	$db = conectarDB(DNS, USUARIO, CONTRASENIA);

	if(isset($_POST['editar'])){
		$oUsuario = new Usuario($_POST['nombre_usuario'], $_POST['contrasenia']);
		$oEmail = new Contacto(2, $_POST['email']);
		$oTelefono = new Contacto(1, $_POST['telefono']);
		$oCelular = new Contacto(1, $_POST['celular']);

		if (($oUsuario->validarContrasenia()) and ($oEmail->validar()) and ($oTelefono->validar()) and ($oCelular->validar())) {

			$sql = "UPDATE usuario SET nombre = ? , contrasenia = ? WHERE idpersona = ?";
			$stmtUsuario = $db->prepare($sql);

			$sql = "
				UPDATE persona 

				SET 
				nombre = ?,
				apellido = ?,
				idtipodocumento = ?,
				numerodocumento = ?,
				sexo = ?,
				nacionalidad = ?,
				email = ?,
				telefono = ?,
				celular = ?,
				domicilio = ?,
				provincia = ?,
				localidad = ?
				
				WHERE idpersona = ?
			";

			$stmtPersona = $db->prepare($sql);

			$aPersona = array(
				$_POST['nombre'], 
				$_POST['apellido'], 
				$_POST['tipo_documento'],
				$_POST['numero_documento'],
				$_POST['sexo'],
				$_POST['nacionalidad'],
				$_POST['email'],
				$_POST['telefono'],
				$_POST['celular'],
				$_POST['domicilio'],
				$_POST['provincia'],
				$_POST['localidad'],
				$_GET['id']
			);

			$db->beginTransaction();

			if(!$stmtUsuario->execute(array($_POST['nombre_usuario'], $_POST['contrasenia'], $_GET['id']))){
				$db->rollBack();
				print_r($stmtUsuario->errorInfo());
			}elseif(!$stmtPersona->execute($aPersona)){
				$db->rollBack();
				print_r($stmtPersona->errorInfo());
			}else{
				$db->commit();
			}

			$db = null;
			$stmtPersona = null;
			$stmtUsuario = null;

			header('location: listar.php');
		}else{
			$db = null;
			header('location: editar.php?id=' . $_GET['id']);
		}
	}

?>