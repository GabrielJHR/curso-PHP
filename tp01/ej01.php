<?php 
	
	//Recibe como parametro un numero entero mayor o igual a cero y retorna un booleano indicando si el año es bisiesto o no
	function bisiesto($anio){
		
		if($anio >= 0)
			if(($anio % 4 == 0) and ($anio % 100 != 0)){
				return true;
			}elseif ($anio % 400 == 0) {
				return true;
			}else{
				return false;
			}

	}


	//Recibe como parametro una fecha en formato ('dd'/'mm'/'YYYY') como string y devuelve un booleano indicando si la fecha es posible o no de acuerdo a nuestro calendario
	function fecha_correcta($fecha){
		$fecha = explode('/', $fecha);

		switch ($fecha[1]) {
			case '01':
			if(($fecha[0] >= 1) and ($fecha[0] <= 31)){
				return true;
			}else{
				return false;
			}
			break;

			
			case '02':
			if(bisiesto($fecha[2]) == true){
				if(($fecha[0] >= 1) and ($fecha[0] <= 29)){
					return true;
				}else{
					return false;
				}
			}else{
				if(($fecha[0] >= 1) and ($fecha[0] <= 28)){
					return true;
				}else{
					return false;
				}
			}
			break;

			case '03':
			if(($fecha[0] >= 1) and ($fecha[0] <= 31)){
				return true;
			}else{
				return false;
			}
			break;

			case '04':
			if(($fecha[0] >= 1) and ($fecha[0] <= 30)){
				return true;
			}else{
				return false;
			}
			break;

			case '05':
			if(($fecha[0] >= 1) and ($fecha[0] <= 31)){
				return true;
			}else{
				return false;
			}
			break;

			case '06':
			if(($fecha[0] >= 1) and ($fecha[0] <= 30)){
				return true;
			}else{
				return false;
			}
			break;

			case '07':
			if(($fecha[0] >= 1) and ($fecha[0] <= 31)){
				return true;
			}else{
				return false;
			}
			break;

			case '08':
			if(($fecha[0] >= 1) and ($fecha[0] <= 31)){
				return true;
			}else{
				return false;
			}
			break;

			case '09':
			if(($fecha[0] >= 1) and ($fecha[0] <= 30)){
				return true;
			}else{
				return false;
			}
			break;

			case '10':
			if(($fecha[0] >= 1) and ($fecha[0] <= 31)){
				return true;
			}else{
				return false;
			}
			break;

			case '11':
			if(($fecha[0] >= 1) and ($fecha[0] <= 30)){
				return true;
			}else{
				return false;
			}
			break;

			case '12':
			if(($fecha[0] >= 1) and ($fecha[0] <= 31)){
				return true;
			}else{
				return false;
			}
			break;

			default:
			return false;
		}
	}

	//La funcion recibe como parametro la fecha de nacimiento en formato ('dd'/'mm'/'YYYY') como string y devuelve un entero que indica la cantidad de años de una persona
	function edad($fechaNacimiento){

		//Comprueba si la fecha de nacimiento ingresada es correcta o no
		if(fecha_correcta($fechaNacimiento) == true){

			list($dia, $mes, $anio) = explode("/",$fechaNacimiento);
			$anio = date("Y") - $anio;
			$mes = date("m") - $mes;
			$dia = date("d") - $dia;

			if ($mes < 0){
				$anio--;
			}
			elseif ($mes == 0 and $dia < 0) {
				$anio--;	
			}

			return $anio;
		}
	}

	//Esta función recibe como parametro un arreglo y muestra en pantalla los datos ordenados sin retornar ningún valor.
	function infoPersona($arreglo){
		printf ("%s, %s de %d años de edad y documento (%s) %s nacido en la fecha %s.</br>", $arreglo['apellido'] , $arreglo['nombre'],edad($arreglo['fecha_nacimiento']) ,$arreglo['tipo_documento'], $arreglo['numero_documento'], $arreglo['fecha_nacimiento']);
	}

	$informacion = array(
		0 => array('apellido' => 'Romero', 'nombre' => 'Fernando',
			'tipo_documento' => 'dni',
			'numero_documento' => '42601837',
			'fecha_nacimiento' =>
			'13/07/2000'),
		1 => array('apellido' => 'Febre ', 'nombre' => 'Yolanda Rosa ',
			'tipo_documento' => 'dni',
			'numero_documento' =>
			'10587664',
			'fecha_nacimiento' => '15/11/1948'),
		2 => array('apellido' => 'Gomez', 'nombre' => 'IRMA',
			'tipo_documento' => 'lc',
			'numero_documento' => '5362812',
			'fecha_nacimiento' => '22/05/1918'),
		3 => array('apellido' => 'Lissa ', 'nombre' => 'Romina ',
			'tipo_documento' => 'dni',
			'numero_documento' => '12385035',
			'fecha_nacimiento' => '13/05/1958'),
		4 => array('apellido' => 'Friz', 'nombre' => 'Carlos Rolando',
			'tipo_documento' => 'dni',
			'numero_documento' => '14128874',
			'fecha_nacimiento' => '01/05/1961'),
		5 => array('apellido' => 'Garzia', 'nombre' => 'Marta Camila',
			'tipo_documento' => 'dni',
			'numero_documento' => '17121841',
			'fecha_nacimiento' => '23/11/1964'),
		6 => array('apellido' => 'Soñez', 'nombre' => 'Jorge Gonzalo',
			'tipo_documento' => 'dni',
			'numero_documento' => '13695121',
			'fecha_nacimiento' => '09/08/1959'),
		7 => array('apellido' => 'PEREZ', 'nombre' => 'GISELA YANINA',
			'tipo_documento' => 'dni',
			'numero_documento' => '31486546',
			'fecha_nacimiento' => '25/03/1985'),
		8 => array('apellido' => 'YNZA', 'nombre' => 'CARLA',
			'tipo_documento' => 'dni',
			'numero_documento' => '28302680',
			'fecha_nacimiento' => '30/01/1981'),
		9 => array('apellido' => 'Martinez', 'nombre' => 'Antonia',
			'tipo_documento' => 'dni',
			'numero_documento' => '38054607',
			'fecha_nacimiento' => '27/04/1994')
	);


	//Recorrer el arreglo
	foreach ($informacion as $clave => $valor) {
		infoPersona($valor);
	}

?>