<?php
	
	function obtengoPersona($id_persona){
		include("include/conexion.php");
		$SQL="SELECT * FROM personas WHERE id=$id_persona";
		$conn=_conectar();
		mysql_select_db("sgp",$conn);
		$resultado=mysql_query($SQL,$conn);
		$registro=mysql_fetch_object($resultado); 
		return $registro; 
	}

if ($_GET['id']!=''){
	$persona=obtengoPersona($_GET['id']);
}
?>
<?php
	include("include/header.html");
?>

<table align="center" width="400px" border="0">
		
			<tr>
				<td>
					<fieldset>
						<legend><b>Agregar Persona</b></legend>
						<br />
						<form action="include/modificoPersona.php" method="post">
						<input type="hidden" name="id" value="<?php echo $persona->id ?>" />
								<table width="100%" cellspacing="0" cellpadding="5" border="0">
									<tr>
										<td align="right">Tipo de Documento:</td>
										<td>
											<select name="tipo_documento">
												<option value="dni">DNI</option>
												<option value="le">LE</option>
												<option value="lc">LC</option>
											</select>
										</td>
									</tr>
									<tr>
										<td align="right">Nro. de Documento:</td>
										<td><input type="text" name="nro_documento" value="<?php echo $persona->nro_documento ?>"/></td>
									</tr>
									<tr>
										<td align="right">Apellido:</td>
										<td><input type="text" name="apellido" value="<?php echo $persona->apellidos ?>" /></td>
									</tr>
									<tr>
										<td align="right">Nombres:</td>
										<td><input type="text" name="nombres" value="<?php echo $persona->nombres ?>" /></td>
									</tr>
									<tr>
										<td align="right">Domicilio:</td>
										<td><input type="text" name="domicilio" value="<?php echo $persona->domicilio ?>"/></td>
									</tr>
									<tr>
										<td align="right">Telefono:</td>
										<td><input type="text" name="telefono" value="<?php echo $persona->telefono ?>" /></td>
									</tr>
									<tr>
										<td align="right">E-mail:</td>
										<td><input type="text" name="email" value="<?php echo $persona->email ?>" /></td>
									</tr>
									<tr>
										<td colspan="2" align="right">
											<input type="submit" name="bt_enviar" value="Modificar" />
											
										</td>
									</tr>
								</table>
						</form>
					</fieldset>
				</td>			
			</tr>		
		</table>