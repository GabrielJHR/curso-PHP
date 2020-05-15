<?php 
	$mes = 5; //Declarar variable

	//Hacer las respectivas operaciones
	if($mes >= 1 && $mes <= 12){
		if($mes <= 2){
			echo "Estación: Verano";
		}elseif ($mes == 3) {
			echo "Estación: Verano u otoño";
		}elseif($mes <= 5){
			echo "Estación: Otoño";
		}elseif ($mes == 6) {
			echo "Estación: Otoño o invierno";
		}elseif ($mes <= 8){
			echo "Estación: Internet";
		}elseif ($mes == 9){
			echo "Estación: Invierno o primavera";
		}elseif ($mes <= 11){
			echo "Estación: Primavera";
		}else{
			echo "Estación: Primavera o verano";
		}
	}else{#Si el mes ingresado no es correcto
		echo "El mes ingresado no es válido.";
	}
?>