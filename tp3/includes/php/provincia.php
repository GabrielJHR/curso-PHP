<?php
	class Provincia
	{
		private $_idProvincia;
		private $_descripcion;
		
		public function __construct($id, $desc)
		{
			$this->_idProvincia = $id;
			$this->_descripcion = $desc;
		}

		public function getIdProvincia()
		{
			return $this->_idProvincia;
		}

		public function getDescripcion()
		{
			return $this->_descripcion;
		}
	}

?>