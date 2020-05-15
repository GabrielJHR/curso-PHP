<?php 
	$operador1 = 1;
	$operador2 = 10;

	echo "
	Operador 1: $operador1 </br>
	Operador 2: $operador2 </br>
	";
	echo "</br>";

	if($operador1 == $operador2){
		echo "$operador1 es igual a $operador2 </br>";
	}else{
		echo "$operador1 es distinto de $operador2 </br>";
		if($operador1 < $operador2){
			echo "$operador1 es menor que $operador2 </br>";	
		}else{
			echo "$operador1 es mayor que $operador2 </br>";	
		}
	}

	if($operador1 <= $operador2){
		echo "$operador1 es menor o igual que $operador2 </br>";
	}else{
		echo "$operador1 es mayor o igual que $operador2 </br>";
	}
?>