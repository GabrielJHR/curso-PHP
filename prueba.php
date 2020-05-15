
<?php

    include 'funcion.php';
    echo algo();
    //SUBIR UN ARCHIVO
    /*
    if(is_uploaded_file($_FILES['curso']['tmp_name'])){
        $temporal = $_FILES['curso']['tmp_name'];
        $carpeta = 'files/';
        $nombre = $_FILES['curso']['name'];
        if(move_uploaded_file($temporal, $carpeta . $nombre)){
            print ( "El archivo se movió satisfactoriamente" );
        }else{
            print ("Ocurrió un error");
        }
    }else{
        echo "No se envió ningún archivo.";
    }*/
    


    //LIMITAR EL TAMAÑO DE UN ARCHIVO
    /*
    if($_FILES['curso']['size'] <= 1024){
        
        $temporal = $_FILES['curso']['tmp_name'];
        $carpeta = 'files/';
        $nombre = $_FILES['curso']['name'];

        if(move_uploaded_file($temporal, $carpeta . $nombre)){
            print ( "El archivo se movió satisfactoriamente" );
        }else{
            print ("Ocurrió un error");
        }

    }else{
        echo "No se envió ningún archivo.";
    }*/


    //Sesiones
    /*
    session_start();
        $id_sesion = session_id();
        echo $id_sesion;
    */

?>