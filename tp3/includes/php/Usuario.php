<?php 
	class Usuario
	{
		private $_nombre;
		private $_contrasenia;

		function __construct($nombre, $contrasenia)
		{
			
			$this->_nombre = $nombre;
			$this->_contrasenia = $contrasenia;
		}

		public function validarContrasenia()
		{
			if ((strlen($this->_contrasenia) >= 6) and (preg_match('`[a-z]`',$this->_contrasenia)) and (preg_match('`[0-9]`',$this->_contrasenia)) ){
				return true;
			}else{
				return false;
			}
		}

		public function getContraseniaEnmascarada()
		{
			return str_repeat('*', strlen($this->_contrasenia));
		}

		public function getNombre()
		{
			return $this->_nombre;
		}

		public function getContrasenia()
		{
			return $this->_contrasenia;
		}
	}
?>