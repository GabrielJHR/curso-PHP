<?php 

include_once 'includes/php/Persona.php';
include_once 'includes/php/Contacto.php';
include_once 'includes/php/TipoDocumento.php';
include_once 'includes/php/Sexo.php';
include_once 'includes/php/provincia.php';
include_once 'includes/php/Usuario.php';

session_start();

//INSTANCIAR LOS OBJETOS NECESARIOS
$tipoDocumento = array(
	'DNI' => new TipoDocumento(1,'DNI'), 
	'LC' => new TipoDocumento(2,'LC'), 
	'LE' => new TipoDocumento(3,'LE') 
);

$sexo = array(
	'Masculino' => new Sexo('M', 'Masculino'),
	'Femenino' => new Sexo('F', 'Femenino')
);

$provincia = array(
	'Entre Rios' => new Provincia(1, 'Entre Rios') ,
	'Santa Fe' => new Provincia(2, 'Santa Fe'),
	'Cordoba' => new Provincia(3, 'Cordoba'),
	'Buenos Aires' => new Provincia(4, 'Buenos Aires'),
	'Catamarca' => new Provincia(5, 'Catamarca'),
	'Corrientes' => new Provincia(6, 'Corrientes') 
);

//si se hizo click en boton enviar del formulario del paso 1
if ( isset($_POST['bt_paso1']) == true )
{
	$pUsuario = new Usuario($_POST['nombre_usuario'], $_POST['contrasenia']);

	if($pUsuario->validarContrasenia() == false){
		$_SESSION['info'] = array(
			'mensaje' => 'La contraseña debe tener al menos 6 caracteres, un numero y una letra',
			'tipo' => 'error'
		);
		header('Location:Paso1.php');
	}else{
		unset($_SESSION['info']);
		$_SESSION['oPersona']->setUsuario($pUsuario);

		$_SESSION['oPersona']->setApellido($_POST['apellido']);
		$_SESSION['oPersona']->setNombre($_POST['nombre']);

		switch ($_POST['tipo_documento']) {
			case $tipoDocumento['DNI']->getIdTipoDocumento():
				$_SESSION['oPersona']->setTipoDocumento($tipoDocumento['DNI']);
				break;
			
			case $tipoDocumento['LC']->getIdTipoDocumento():
				$_SESSION['oPersona']->setTipoDocumento($tipoDocumento['LC']);
				break;

			case $tipoDocumento['LE']->getIdTipoDocumento():
				$_SESSION['oPersona']->setTipoDocumento($tipoDocumento['LE']);
				break;
		}
		
		$_SESSION['oPersona']->setNumeroDocumento($_POST['numero_documento']);

		switch ($_POST['sexo']) {
			case $sexo['Masculino']->getIdSexo():
				$_SESSION['oPersona']->setSexo($sexo['Masculino']);
				break;
			
			case $sexo['Femenino']->getIdSexo():
				$_SESSION['oPersona']->setSexo($sexo['Femenino']);
				break;
		}

		$_SESSION['oPersona']->setNacionalidad($_POST['nacionalidad']);
	}
}

//si la variable informacion_contacto no esta establecida en el arreglo de la sesion
if ( isset($_SESSION['informacion_contacto']) == false )
{
	$_SESSION['oPersona']->setEmail(new Contacto(2,''));
	$_SESSION['oPersona']->setTelefono(new Contacto(1, ''));
	$_SESSION['oPersona']->setCelular(new Contacto(1, ''));
	$_SESSION['oPersona']->setDomicilio('');
	$_SESSION['oPersona']->setProvincia(new Provincia(0, 'Elegir provincia'));
	$_SESSION['oPersona']->setLocalidad('');
}

$informacionContacto = $_SESSION['oPersona'];

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
	<?php 
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

			}

		?>
	<form action="Paso3.php" method="post">
		<fieldset>
			<legend>Informaci&oacute;n de Contacto:</legend>
			
			<ul>
				<li><label>Correo electr&oacute;nico:</label></li>
				<li><input type="text" name="email" value="<?= $informacionContacto->getEmail()->getValor() ?>"></li>
				
				<li><label>Tel&eacute;fono:</label></li>
				<li><input type="text" name="telefono" value="<?= $informacionContacto->getTelefono()->getValor() ?>"></li>
				
				<li><label>Celular:</label></li>
				<li><input type="text" name="celular" value="<?= $informacionContacto->getCelular()->getValor() ?>"></li>
				
				<li><label>Domicilio:</label></li>
				<li><input type="text" name="domicilio" value="<?= $informacionContacto->getDomicilio()?>"></li>
				
				<li><label>Provincia:</label></li>
				<li>
					<select name="provincia">
						<option value="<?= $provincia['Entre Rios']->getIdProvincia() ?>" <?php echo ( $informacionContacto->getProvincia()->getIdProvincia() == $provincia['Entre Rios']->getIdProvincia() ) ? 'selected="selected"' : '' ; ?>><?= $provincia['Entre Rios']->getDescripcion() ?></option>

						<option value="<?= $provincia['Santa Fe']->getIdProvincia() ?>" <?php echo ( $informacionContacto->getProvincia()->getIdProvincia() == $provincia['Santa Fe']->getIdProvincia() ) ? 'selected="selected"' : '' ; ?>><?= $provincia['Santa Fe']->getDescripcion() ?></option>

						<option value="<?= $provincia['Cordoba']->getIdProvincia() ?>" <?php echo ( $informacionContacto->getProvincia()->getIdProvincia() == $provincia['Cordoba']->getIdProvincia() ) ? 'selected="selected"' : '' ; ?>><?= $provincia['Cordoba']->getDescripcion() ?></option>

						<option value="<?= $provincia['Buenos Aires']->getIdProvincia() ?>" <?php echo ( $informacionContacto->getProvincia()->getIdProvincia() == $provincia['Buenos Aires']->getIdProvincia() ) ? 'selected="selected"' : '' ; ?>><?= $provincia['Buenos Aires']->getDescripcion() ?></option>

						<option value="<?= $provincia['Catamarca']->getIdProvincia() ?>" <?php echo ( $informacionContacto->getProvincia()->getIdProvincia() == $provincia['Catamarca']->getIdProvincia() ) ? 'selected="selected"' : '' ; ?>><?= $provincia['Catamarca']->getDescripcion() ?></option>

						<option value="<?= $provincia['Corrientes']->getIdProvincia() ?>" <?php echo ( $informacionContacto->getProvincia()->getIdProvincia() == $provincia['Corrientes']->getIdProvincia() ) ? 'selected="selected"' : '' ; ?>><?= $provincia['Corrientes']->getDescripcion() ?></option>
						
					</select>
				</li>
				
				<li><label>Localidad:</label></li>
				<li><input type="text" name="localidad" value="<?php echo $informacionContacto->getLocalidad(); ?>"></li>
			</ul>
			
			<div class="buttons">
				<input type="submit" name="bt_paso2" value="Siguiente">
				<input type="button" value="Anterior" onclick="document.location='Paso1.php'">
			</div>
		</fieldset>
	</form>
	
	<div class="push"></div>
	
</div>

<?php require_once 'includes/php/footer.php'; ?>
</body>
</html>