<?php 
    $num = 0; //declarar variable

    if($num >= -5 && $num <= 5){//Operador logico (AND)
        print "El numero $num pertence al conjunto {x/ -5<=x<=5}. </br>";
    } 

    if($num < -5 || $num > 5 ){ //Operador logico (OR)
        print "El numero $num pertence al conjunto {x/x<-5} U {x/x>5}. </br>";
    }

    if($num > -5 xor $num < 5){// Operador logico (XOR).
        print "El numero $num pertence al conjunto {x/x > -5} o bien {x/x < 5}. </br>";
    }
?>