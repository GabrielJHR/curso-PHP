<?php
	class Contacto
	{
		const TIPO_TELEFONO = 1;
		const TIPO_EMAIL = 2;

		private $_tipo;
		private $_valor;

		public function __construct($tipo, $valor)
		{
			$this->_tipo = $tipo;
			$this->_valor = $valor;
		}

		public function validar()
		{	
			if(($this->_tipo == self::TIPO_TELEFONO) and (strlen($this->_valor) >= 10) and (strpos($this->_valor, '-')) ){
				return true;
			}elseif (($this->_tipo == self::TIPO_EMAIL) and (strpos($this->_valor, '@')) ) {
				return true;
			}else{
				return false;
			}
		
		}

		public function getTipo()
		{
			return $this->_tipo;
		}

		public function getValor()
		{
			return $this->_valor;
		}
	}
?>