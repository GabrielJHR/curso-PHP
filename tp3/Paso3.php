<?php 
include_once 'includes/php/Persona.php';
include_once 'includes/php/Contacto.php';
include_once 'includes/php/provincia.php';

session_start();

//Provincias
$provincia = array(
	'Entre Rios' => new Provincia(1, 'Entre Rios') ,
	'Santa Fe' => new Provincia(2, 'Santa Fe'),
	'Cordoba' => new Provincia(3, 'Cordoba'),
	'Buenos Aires' => new Provincia(4, 'Buenos Aires'),
	'Catamarca' => new Provincia(5, 'Catamarca'),
	'Corrientes' => new Provincia(6, 'Corrientes') 
);

//Si el boton enviar del formulario del paso 2 fue presionado
if ( isset($_POST['bt_paso2']) == true )
{	
	//Obtener informacion de contacto y crear una instancia de los objetos
	$oEmail = new Contacto(2, $_POST['email']);
	$oTelefono = new Contacto(1, $_POST['telefono']);
	$oCelular = new Contacto(1, $_POST['celular']);

	//Validar informacion
	if($oEmail->validar() == false){
		$_SESSION['info'] = array(
			'mensaje' => 'La direccion de correo elctronico debe contener @',
			'tipo' => 'error'
		);

		header('Location:Paso2.php');
	}elseif($oTelefono->validar() == false){
		$_SESSION['info'] = array(
			'mensaje' => 'El numero de teléfono debe contener - entre medio y al menos 10 caracteres',
			'tipo' => 'error'
		);

		header('Location:Paso2.php');
	}elseif($oCelular->validar() == false){
		$_SESSION['info'] = array(
			'mensaje' => 'El numero de celular debe contener - entre medio y al menos 10 caracteres',
			'tipo' => 'error'
		);

		header('Location:Paso2.php');
	}else{
		$_SESSION['informacion_contacto'] = true;
		unset($_SESSION['info']);

		switch ($_POST['provincia']) {
			case $provincia['Entre Rios']->getIdProvincia() :
				$oProvincia = new Provincia($provincia['Entre Rios']->getIdProvincia(), $provincia['Entre Rios']->getDescripcion());
				break;

			case $provincia['Santa Fe']->getIdProvincia() :
				$oProvincia = new Provincia($provincia['Santa Fe']->getIdProvincia(), $provincia['Santa Fe']->getDescripcion());
				break;

			case $provincia['Cordoba']->getIdProvincia() :
				$oProvincia = new Provincia($provincia['Cordoba']->getIdProvincia(), $provincia['Cordoba']->getDescripcion());
				break;
			
			case $provincia['Buenos Aires']->getIdProvincia() :
				$oProvincia = new Provincia($provincia['Buenos Aires']->getIdProvincia(), $provincia['Buenos Aires']->getDescripcion());
				break;

			case $provincia['Catamarca']->getIdProvincia() :
				$oProvincia = new Provincia($provincia['Catamarca']->getIdProvincia(), $provincia['Catamarca']->getDescripcion());
				break;

			case $provincia['Corrientes']->getIdProvincia() :
				$oProvincia = new Provincia($provincia['Corrientes']->getIdProvincia(), $provincia['Corrientes']->getDescripcion());
				break;
		}
		
		$_SESSION['oPersona']->setEmail($oEmail);
		$_SESSION['oPersona']->setTelefono($oTelefono);
		$_SESSION['oPersona']->setCelular($oCelular);
		$_SESSION['oPersona']->setDomicilio($_POST['domicilio']);
		$_SESSION['oPersona']->setProvincia($oProvincia);
		$_SESSION['oPersona']->setLocalidad($_POST['localidad']);
	}
}

$oPersona = $_SESSION['oPersona'];

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
	
	<h2>Informaci&oacute;n de alta de usuario</h2>
	
	<div class="ultimo_paso">
		
		<fieldset>
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li><?= $oPersona->getUsuario()->getNombre() ?><br></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><?= $oPersona->getUsuario()->getContraseniaEnmascarada() ?><br></li>
				
				<li><label>Apellido:</label></li>
				<li><?= $oPersona->getApellido() ?></li>
				
				<li><label>Nombre:</label></li>
				<li><?= $oPersona->getNombre() ?></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li><?= $oPersona->getTipoDocumento()->getDescripcion() ?></li>
				
				<li><label>N&uacute;mero de Documento:</label></li>
				<li><?= $oPersona->getNumeroDocumento() ?></li>
				
				<li><label>Sexo:</label></li>
				<li><?= $oPersona->getSexo()->getDescripcion() ?></li>
				
				<li><label>Nacionalidad:</label></li>
				<li><?= $oPersona->getNacionalidad() ?></li>
			</ul>
			
		</fieldset>
		
		<fieldset>
			<legend>Informaci&oacute;n de Contacto:</legend>
			
			<ul>
				<li><label>Correo electr&oacute;nico:</label></li>
				<li><?= $oPersona->getEmail()->getValor()  ?></li>
				
				<li><label>Tel&eacute;fono:</label></li>
				<li><?= $oPersona->getTelefono()->getValor()  ?></li>
				
				<li><label>Celular:</label></li>
				<li><?= $oPersona->getCelular()->getValor()  ?></li>
				
				<li><label>Domicilio:</label></li>
				<li><?= $oPersona->getDomicilio() ?></li>
				
				<li><label>Provincia:</label></li>
				<li><?= $oPersona->getProvincia()->getDescripcion() ?></li>
				
				<li><label>Localidad:</label></li>
				<li><?= $oPersona->getLocalidad()  ?></li>
			</ul>
			
		</fieldset>
		
		<fieldset>
		
			<div class="buttons">
				<input type="button" value="Guardar" onclick="document.location='Finalizar.php'">
				<input type="button" value="Anterior" onclick="document.location='Paso2.php'">
			</div>
			
		</fieldset>
		
	</div>
	
	<div class="push"></div>
	
</div>

<?php require_once 'includes/php/footer.php'; 

?>
</body>
</html>