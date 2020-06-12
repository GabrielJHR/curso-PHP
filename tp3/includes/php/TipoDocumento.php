<?php
class TipoDocumento
{
	private $_idTipoDocumento;
	private $_descripcion;

	public function __construct($id , $_descripcion)
	{
		$this->_idTipoDocumento = $id;
		$this->_descripcion = $_descripcion;
	}

	public function getIdTipoDocumento(){
		return $this->_idTipoDocumento;
	}

	public function getDescripcion(){
		return $this->_descripcion;
	}
}

?>