<?php

	function _conectar(){
		$conexion=mysql_connect("localhost","root","");
		if (!$conexion){
			echo "Error conectando a la Base de Datos. Revis� usuario y contrase�a.";
			die();
		}else{
			return $conexion;
		}
	}