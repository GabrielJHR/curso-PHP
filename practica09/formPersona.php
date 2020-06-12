<?php
include("include/header.html");
?>
		<table align="center" width="100%" border="0">
		
			<tr>
				<td>
					<fieldset>
						<legend><b>Agregar Persona</b></legend>
						<br />
						<form action="include/agregoPersona.php" method="post">
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
										<td><input type="text" name="nro_documento" /></td>
									</tr>
									<tr>
										<td align="right">Apellido:</td>
										<td><input type="text" name="apellido" /></td>
									</tr>
									<tr>
										<td align="right">Nombres:</td>
										<td><input type="text" name="nombres" /></td>
									</tr>
									<tr>
										<td align="right">Domicilio:</td>
										<td><input type="text" name="domicilio" /></td>
									</tr>
									<tr>
										<td align="right">Telefono:</td>
										<td><input type="text" name="telefono" /></td>
									</tr>
									<tr>
										<td align="right">E-mail:</td>
										<td><input type="text" name="email" /></td>
									</tr>
									<tr>
										<td colspan="2" align="right">
											<input type="reset" name="bt_borrar" value="Borrar" />
											<input type="submit" name="bt_enviar" value="Agregar" />
											
										</td>
									</tr>
								</table>
						</form>
					</fieldset>
				</td>			
			</tr>		
		</table>
		

<?php
	include("include/footer.html");
?>