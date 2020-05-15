<?php 
	$dia = 2; //Declarar la variable para el dia de la semana

	switch ($dia) { #Comparar la variable dia con cada uno de los casos
		case 1:
			echo "Dia: Domingo";
			break;
		case 2:
			echo "Dia: Lunes";
			break;
		case 3:
			echo "Dia: Martes";
			break;
		case 4:
			echo "Dia: Miercoles";
			break;
		case 5:
			echo "Dia: Jueves";
			break;
		case 6:
			echo "Dia: Viernes";
			break;
		case 7:
			echo "Dia: Sabado";
			break;
		default: #En el caso de que el dia ingresado supere a 7 o sea inferior a 1
			echo "El dia ingresado no es correcto.";
			break;
	}

?>