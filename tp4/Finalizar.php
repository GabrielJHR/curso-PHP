<?php
require_once 'includes/clases/Persona.php';
session_start();

require_once 'includes/php/conexion.php';

$oPersona = $_SESSION['Persona'];

$db = conectarDB(DNS, USUARIO, CONTRASENIA);

//Insertar persona
$sql = 'INSERT INTO persona(idtipodocumento, apellido, nombre, numerodocumento, sexo, nacionalidad, email, telefono, celular, provincia, localidad) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
$stmtPersona = $db->prepare($sql);

//Insertar Usuario
$sql = 'INSERT INTO usuario(idpersona, idtipousuario, nombre, contrasenia) VALUES(?,?,?,?)';
$stmtUsuario = $db->prepare($sql);

$idtipodocumento = $oPersona->getTipoDocumento()->getIdTipoDocumento();
$apellido = $oPersona->getApellido();
$nombre = $oPersona->getNombre();
$numerodocumento = $oPersona->getNumeroDocumento();
$sexo = $oPersona->getSexo()->getIdSexo();
$nacionalidad = $oPersona->getNacionalidad();
$email = $oPersona->getEmail()->getValor();
$telefono = $oPersona->getTelefono()->getValor();
$celular = $oPersona->getCelular()->getValor();
$provincia = $oPersona->getProvincia()->getDescripcion();
$localidad = $oPersona->getLocalidad();
$username = $oPersona->getUsuario()->getNombre();
$password = $oPersona->getUsuario()->getContrasenia();

$db->beginTransaction();

if(!$stmtPersona->execute(array($idtipodocumento, $apellido, $nombre, $numerodocumento, $sexo, $nacionalidad, $email, $telefono, $celular, $provincia, $localidad))){
	$db->rollBack();
	print_r($stmtPersona->errorInfo());
}elseif(!$stmtUsuario->execute(array($db->lastInsertId(), 2, $username, $password))){
	$db->rollBack();
	print_r($stmtUsuario->errorInfo());
}else{
	$db->commit();
}

session_destroy();

$stmtPersona = null;
$stmtUsuario = null;
$db = null;
header('location: Paso1.php');
?>