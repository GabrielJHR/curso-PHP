<?php 
include_once 'includes/php/Persona.php';
include_once 'includes/php/TipoDocumento.php';
include_once 'includes/php/Sexo.php';
session_start();

//Crear los objetos
$tipoDocumento = array(
	'DNI' => new TipoDocumento(1,'DNI'), 
	'LC' => new TipoDocumento(2,'LC'), 
	'LE' => new TipoDocumento(3,'LE') 
);

$sexo = array(
	'Masculino' => new Sexo('M', 'Masculino'),
	'Femenino' => new Sexo('F', 'Femenino')
);

//Si el objeto tipo persona en la sesion no fue creado lo crea
if ( isset($_SESSION['oPersona']) == false )
{
	$_SESSION['oPersona'] = new Persona();
	$_SESSION['oPersona']->setApellido('');
	$_SESSION['oPersona']->setNombre('');
	$_SESSION['oPersona']->setNumeroDocumento('');
	$_SESSION['oPersona']->setNacionalidad('');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once 'includes/php/header.php'; ?>
	
	<form action="Paso2.php" method="post">
		<?php
			//Si hay un error lo va a mostrar en este cuadro
			if(isset($_SESSION['info'])){
				switch ($_SESSION['info']['tipo']) {
					case 'error':
						echo '<small style="color: red">', $_SESSION['info']['mensaje'] ,'</small>';
						break;

					case 'advertencia':
						echo '<small style="color: yellow">', $_SESSION['info']['mensaje'] ,'</small>';
						break;

					case 'exito':
						echo '<small style="color: green">', $_SESSION['info']['mensaje'] ,'</small>';
						break;
					
					default:
						echo '';
						break;
				}

				unset($_SESSION['info']);
			}

		?>
		<!-- FORMULARIO -->
		<fieldset>
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li>
					<input type="text" name="nombre_usuario" value="<?= $_SESSION['oPersona']->getUsuario()->getNombre()?>">
				</li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value="<?php echo $_SESSION['oPersona']->getUsuario()->getContrasenia(); ?>"></li>
				
				<li><label>Apellido:</label></li>
				<li><input type="text" name="apellido" value="<?php echo $_SESSION['oPersona']->getApellido(); ?>"></li>
				
				<li><label>Nombre:</label></li>
				<li><input type="text" name="nombre" value="<?php echo $_SESSION['oPersona']->getNombre(); ?>"></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li>
					<select name="tipo_documento">
						<option value="<?= $_SESSION['oPersona']->getTipoDocumento()->getIdTipoDocumento() ?>"><?= $_SESSION['oPersona']->getTipoDocumento()->getDescripcion() ?></option>
						<option value="<?= $tipoDocumento['DNI']->getIdTipoDocumento() ?>"><?= $tipoDocumento['DNI']->getDescripcion() ?></option>
						<option value="<?= $tipoDocumento['LC']->getIdTipoDocumento() ?>"><?= $tipoDocumento['LC']->getDescripcion() ?></option>
						<option value="<?= $tipoDocumento['LE']->getIdTipoDocumento() ?>"><?= $tipoDocumento['LE']->getDescripcion() ?></option>
					</select>
				</li>
				
				<li><label>N&uacute;mero de Documento:</label></li>
				<li><input type="text" name="numero_documento" value="<?php echo $_SESSION['oPersona']->getNumeroDocumento(); ?>"></li>
				
				<li><label>Sexo:</label></li>
				<li>
					
					<label class="radio">
						<input type="radio" name="sexo" value="<?= $sexo['Masculino']->getIdSexo() ?>" <?php echo ( $_SESSION['oPersona']->getSexo()->getIdSexo() == $sexo['Masculino']->getIdSexo() ) ? 'checked="checked"' : '' ; ?>>

						<?= $sexo['Masculino']->getDescripcion() ?></label>

						<input type="radio" name="sexo" value="<?= $sexo['Femenino']->getIdSexo() ?>" <?php echo ( $_SESSION['oPersona']->getSexo()->getIdSexo() == $sexo['Femenino']->getIdSexo() ) ? 'checked="checked"' : '' ; ?>>

						<?= $sexo['Femenino']->getDescripcion() ?></label>
				</li>
				
				<li><label>Nacionalidad:</label></li>
				<li><input type="text" name="nacionalidad" value="<?php echo $_SESSION['oPersona']->getNacionalidad(); ?>"></li>
			</ul>
			
			<div class="buttons">
				<input type="submit" name="bt_paso1" value="Siguiente">
			</div>
		</fieldset>
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once 'includes/php/footer.php'; ?>
</body>
</html>