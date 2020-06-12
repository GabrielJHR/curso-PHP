<?php

class Sexo{
	private $_idSexo;
	private $_descripcion;

	public function __construct($id, $desc){
		$this->_idSexo = $id;
		$this->_descripcion = $desc;
	}

	public function getIdSexo()
	{
		return $this->_idSexo;
	}

	public function getDescripcion()
	{
		return $this->_descripcion;
	}
}

?>