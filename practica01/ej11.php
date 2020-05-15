<?php 
	$mes = 11; //Declarar variable

	if($mes >= 1 && $mes <= 12){ //Delimitar los numeros disponibles para cada mes
		if($mes <= 2){
			echo "Estación: Verano";
		}else{
			if ($mes == 3) {
				echo "Estación: Verano u otoño";
			}else{
				if($mes <= 5){
					echo "Estación: Otoño";
				}else{
					if ($mes == 6) {
						echo "Estación: Otoño o invierno";
					}else{
						if ($mes <= 8){
							echo "Estación: Internet";
						}else{
							if ($mes == 9){
								echo "Estación: Invierno o primavera";
							}else{
								if ($mes <= 11){
									echo "Estación: Primavera";
								}else{
									echo "Estación: Primavera o verano";
								}
							}
						}
					}
				}
			}
		}
	}else{ #Si el mes ingresado no está entre 1 y 12
		echo "El mes ingresado no es válido.";
	}
?>