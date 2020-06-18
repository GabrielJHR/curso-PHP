<?php
	require_once '../includes/php/conexion.php';
	require_once '../includes/clases/Sexo.php';
	require_once '../includes/clases/TipoDocumento.php';
	require_once '../includes/php/objetos.php';

	$tituloPagina = "SGU | Editar usuario";
	

	$db = conectarDB(DNS, USUARIO, CONTRASENIA);

	$sql = "select * , u.nombre as username
			from tipodocumento td, persona p, usuario u
			where td.idtipodocumento = p.idtipodocumento
			and p.idpersona = u.idpersona
			and p.idpersona = ?
";

	$stmtInfo = $db->prepare($sql);

	$stmtInfo->execute(array($_GET['id']));

	$resultado = $stmtInfo->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Modificar usuario</title>
	<link type="text/css" rel="stylesheet" href="../includes/css/estilos.css">
</head>
<body>

<div class="wraper">
	<?php require_once '../includes/php/header.php'; ?>
	
	<form action="editar_usuario.php?id=<?= $resultado['idpersona'] ?>" method="post">
		<fieldset>
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
				<!-- INFORMACION DE USUARIO -->

				<li><label>Nombre de Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value="<?= $resultado['username']?>"></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value="<?= $resultado['contrasenia']?>"></li>
				
				<li><label>Apellido:</label></li>
				<li><input type="text" name="apellido" value="<?= $resultado['apellido'] ?>"></li>
				
				<li><label>Nombre:</label></li>
				<li><input type="text" name="nombre" value="<?= $resultado['nombre'] ?>"></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li>
					<select name="tipo_documento">
						<?php foreach ( $aTipoDocumento as $oTipoDocumento ) { ?>
						<option value="<?= $oTipoDocumento->getIdTipoDocumento() ?>" <?= ( $resultado['idtipodocumento'] == $oTipoDocumento->getIdTipoDocumento() ) ? 'selected="selected"' : ''  ?>><?= $oTipoDocumento->getDescripcion() ?></option>
						<?php } ?>
					</select>
				</li>
				
				<li><label>N&uacute;mero de Documento:</label></li>
				<li><input type="text" name="numero_documento" value="<?= $resultado['numerodocumento'] ?>"></li>
				
				<li><label>Sexo:</label></li>
				<li>
					<?php foreach ( $aSexo as $oSexo ) { ?>
					<label class="radio"><input type="radio" name="sexo" value="<?= $oSexo->getIdSexo() ?>" <?= ( $resultado['sexo'] == $oSexo->getIdSexo() ) ? 'checked="checked"' : ''  ?>> <?= $oSexo->getDescripcion() ?></label>
					<?php } ?>
				</li>
				
				<li><label>Nacionalidad:</label></li>
				<li><input type="text" name="nacionalidad" value="<?= $resultado['nacionalidad'] ?>"></li>
			

			<!-- INFORMACION DE CONTACTO -->

				<li><label>Correo electr&oacute;nico:</label></li>
				<li><input type="text" name="email" value="<?= $resultado['email'] ?>"></li>

				<li><label>Tel&eacute;fono:</label></li>
				<li><input type="text" name="telefono" value="<?= $resultado['telefono'] ?>"></li>

				<li><label>Celular:</label></li>
				<li><input type="text" name="celular" value="<?= $resultado['celular'] ?>"></li>

				<li><label>Domicilio:</label></li>
				<li><input type="text" name="domicilio" value="<?= $resultado['domicilio'] ?>"></li>

				<li><label>Provincia:</label></li>
				<li>
					<select name="provincia">
						<?php foreach ( $aProvincia as $oProvincia ) { ?>
						<option value="<?= $oProvincia->getIdProvincia() ?>" <?= ( $resultado['provincia'] == $oProvincia->getDescripcion() ) ? 'selected="selected"' : ''  ?>><?= $oProvincia->getDescripcion() ?></option>
						<?php } ?>
					</select>
				</li>

				<li><label>Localidad:</label></li>
				<li><input type="text" name="localidad" value="<?= $resultado['localidad'] ?>"></li>
				
				<div class="buttons">
					<input type="submit" name="editar" value="Editar">
				</div>
			</ul>
		</fieldset>
	</form>

	<div class="push"></div>
	
</div>

<?php 
	require_once '../includes/php/footer.php'; 
	$db = null;
	$stmtInfo = null;
	$resultado = null;
?>
</body>
</html>