<?php
	include("include/conexion.php");
	
	if ($_GET['id']){
		include("include/borrarPersona.php");
	}
	$SQL="SELECT * FROM personas";
	$conn=_conectar();
	mysql_select_db("sgp",$conn);
	$resultado=mysql_query($SQL,$conn);
	$filas="";
	$cant=mysql_num_rows($resultado);
	if ($cant==0){
		$filas="<tr><td colspan='4'>No se encontraron personas en la base de datos.</td></tr>";
	}else{
		while ($registro=mysql_fetch_object($resultado)){
			$filas.="<tr>";
				$filas.="<td>".$registro->nro_documento."</td>";
				$filas.="<td>".$registro->apellidos."</td>";
				$filas.="<td>".$registro->nombres."</td>";
				$filas.="<td><a href='borrarPersonas.php?id=".$registro->id."'>";
				$filas.="<img src='imgs/delete.png' border='0' />";
				$filas.="</a></td>";
			$filas.="</tr>";
		}
	}
?>

<?php
	include("include/header.html");
?>
	<table align="center" width="400px" border="0">
		
			<tr>
				<td>
					<fieldset>
						<legend><b>Listado de Personas</b></legend>
						<br />
								<table width="100%" cellspacing="0" cellpadding="5" border="0">
									<tr>
										<td><b>Documento</b></td>
										<td><b>Apellido</b></td>
										<td><b>Nombres</b></td>
										<td><b>Borrar</b></td>
									</tr>
									<?php echo $filas;?>									
								</table>
					</fieldset>
				</td>			
			</tr>		
		</table>

<?php
	include("include/footer.html");
?>