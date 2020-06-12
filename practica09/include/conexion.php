<?php

	function _conectar(){
		$conexion=mysql_connect("localhost","root","");
		if (!$conexion){
			echo "Error conectando a la Base de Datos. Revisá usuario y contraseña.";
			die();
		}else{
			return $conexion;
		}
	}