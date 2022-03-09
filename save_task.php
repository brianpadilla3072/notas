<?php

include ("bd.php"); // llamamos la coneccion

// recibe loque se ingreso ylo guarda en variables//
    if(isset($_POST["save_task"])){ 
        /* si existe atraves del metodo POST el valor "save_task" 
        , estan intentando guardar un dato */
        $title = $_POST["title"]; // lo que recibas de el metodo post --> title, lo vas a guardar en $title//
        $description = $_POST["description"];
    
        //inserta dentrode la tabla talsk un titulo y una descripcion
       $query ="INSERT INTO talsk(title,description)
        /*este titulo y estadescripcion*/
        VALUES('$title','$description')";

        //para hacer uana consuñlta es necesario especificar la cadena de coneccion( $con)y la consylta ($query) 
        $resultado = mysqli_query($com,$query);
        if(!$resultado){
            // que hacemos si nose guarda//
                die("query failed");
         }
         // en el caso de que se guardo//
         $_SESSION['messaje'] = " se guardo en task";
         $_SESSION['messaje_type'] = 'success';

        // que nos redireccione al index//
         header("location: index.php");

    }

?>