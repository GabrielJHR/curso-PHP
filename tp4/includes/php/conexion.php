<?php
	const DNS = 'mysql:host=localhost:3306; dbname=trabajo_04';
	const USUARIO = 'root';
	const CONTRASENIA = '';

	function conectarDB($dns, $usuario, $contrasenia)
	{
		try{
			$dbConexion = new PDO($dns, $usuario, $contrasenia);
			return $dbConexion;
		}catch (Exception $e){
			die('Error: '. $e->getMessage());
		}
	}
?>