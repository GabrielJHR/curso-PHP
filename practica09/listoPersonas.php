<?php
	include("include/conexion.php");
	$SQL="SELECT * FROM personas";
	$conn=_conectar();
	mysql_select_db("sgp",$conn);
	$resultado=mysql_query($SQL,$conn);
	$filas="";
	while ($registro=mysql_fetch_object($resultado)){
		$filas.="<tr>";
			$filas.="<td>".$registro->nro_documento."</td>";
			$filas.="<td>".$registro->apellidos."</td>";
			$filas.="<td>".$registro->nombres."</td>";
			$filas.="<td align='center'><a href='modificoPersona.php?id=".$registro->id."'>";
			$filas.="<img src='imgs/edit.png' border='0' />";
			$filas.="</td>";
		$filas.="</tr>";
	}
	include("include/header.html");
	
?>
	<table align="center" width="400px" border="0">
		
			<tr>
				<td>
					<fieldset>
						<legend><b>Listado de Personas</b></legend>
						<br />
						<form action="include/agregoPersona.php" method="post">
								<table width="100%" cellspacing="0" cellpadding="5" border="0">
									<tr>
										<td><b>Documento</b></td>
										<td><b>Apellido</b></td>
										<td><b>Nombres</b></td>
										<td><b>Modificar</b></td>
									</tr>
									<?php echo $filas;?>									
								</table>
						</form>
					</fieldset>
				</td>			
			</tr>		
		</table>
<?php
	include("include/footer.html");
?>