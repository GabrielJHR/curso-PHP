<?php
	$id_persona=$_GET['id'];
	$SQL="DELETE FROM personas WHERE id=$id_persona";
	$conn=_conectar();
		mysql_select_db("sgp",$conn);
		mysql_query($SQL,$conn);
	mysql_close();
