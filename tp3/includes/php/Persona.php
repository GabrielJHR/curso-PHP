<?php

include_once 'includes/php/Contacto.php';
include_once 'includes/php/Usuario.php';
include_once 'includes/php/provincia.php';
include_once 'includes/php/Sexo.php';
include_once 'includes/php/TipoDocumento.php';

class Persona
{
	private $_apellido;
	private $_nombre;
	private $_numeroDocumento;
	private $_tipoDocumento;
	private $_sexo;
	private $_usuario;
	private $_nacionalidad;
	private $_email;
	private $_telefono;
	private $_celular;
	private $_domicilio;
	private $_provincia;
	private $_localidad;

	public function __construct()
	{
		$this->_tipoDocumento = new TipoDocumento(0, 'Elegir tipo de documento');
		$this->_sexo = new Sexo('M', 'Masculino');
		$this->_usuario = new Usuario('', '');
		$this->_email = new Contacto(2, "");
		$this->_celular = new Contacto(1, "");
		$this->_telefono = new Contacto(1, "");
		$this->_provincia = new Provincia(0, "Elegir provincia"); 
	}

	//getters
	public function getApellido()
	{
		return $this->_apellido;
	}

	public function getNombre()
	{
		return $this->_nombre;
	}

	public function getNumeroDocumento()
	{
		return $this->_numeroDocumento;
	}

	public function getTipoDocumento()
	{
		return $this->_tipoDocumento;
	}

	public function getSexo()
	{
		return $this->_sexo;
	}

	public function getUsuario()
	{
		return $this->_usuario;
	}

	public function getNacionalidad()
	{
		return $this->_nacionalidad;
	}

	public function getEmail()
	{
		return $this->_email;
	}

	public function getTelefono()
	{
		return $this->_telefono;
	}

	public function getCelular()
	{
		return $this->_celular;
	}

	public function getDomicilio()
	{
		return $this->_domicilio;
	}

	public function getProvincia()
	{
		return $this->_provincia;
	}

	public function getLocalidad()
	{
		return $this->_localidad;
	}

	//setters
	public function setApellido($apellido)
	{
		$this->_apellido = $apellido;
	}

	public function setNombre($nombre)
	{
		$this->_nombre = $nombre;
	}

	public function setNumeroDocumento($numeroDocumento)
	{
		$this->_numeroDocumento = $numeroDocumento;
	}

	public function setTipoDocumento(TipoDocumento $tipoDocumento)
	{
		$this->_tipoDocumento = $tipoDocumento;
	}

	public function setSexo(Sexo $sexo)
	{
		$this->_sexo = $sexo;
	}

	public function setUsuario(Usuario $usuario)
	{
		$this->_usuario = $usuario;
	}

	public function setNacionalidad($nacionalidad)
	{
		$this->_nacionalidad = $nacionalidad;
	}

	public function setEmail(Contacto $email )
	{
		$this->_email = $email;
	}

	public function setTelefono(Contacto $telefono )
	{
		$this->_telefono = $telefono;
	}

	public function setCelular(Contacto $celular )
	{
		$this->_celular = $celular;
	}

	public function setDomicilio($domicilio)
	{
		$this->_domicilio = $domicilio;
	}

	public function setProvincia(Provincia $provincia)
	{
		$this->_provincia = $provincia;
	}

	public function setLocalidad($localidad)
	{
		$this->_localidad = $localidad;
	}
}

?>