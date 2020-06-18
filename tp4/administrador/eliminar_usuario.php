<?php
	require_once '../includes/php/conexion.php';

	$db = conectarDB(DNS, USUARIO, CONTRASENIA);

	$sql = 'DELETE FROM usuario WHERE idpersona = ?';
	$stmtUsuario = $db->prepare($sql);

	$sql = 'DELETE FROM persona WHERE idpersona = ?';
	$stmtPersona = $db->prepare($sql);

	$db->beginTransaction();

	if(!$stmtUsuario->execute(array($_GET['id']))){
		$db->rollBack();
		print_r($stmtUsuario->errorInfo());
	}elseif(!$stmtPersona->execute(array($_GET['id']))){
		$db->rollBack();
		print_r($stmtPersona->errorInfo());
	}else{
		$db->commit();
	}

	$stmtPersona = null;
	$stmtUsuario = null;
	$db = null;

	header('location: listar.php');
?>