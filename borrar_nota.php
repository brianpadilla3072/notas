<?php
include("bd.php");
// decimos que si elid es iguala alguno de la tabla, entonces vamos a //
if(isset($_GET['id'])){

$id = $_GET['id']; // guardmos el id en una variable //

$query = "DELETE FROM talsk WHERE id = $id"; // elimina desde tareas, donde elid sea igual a la variable id //

$result = mysqli_query($com,$query);

if(!$result){
    die("no se pudo realizar");
} // en el caso de que se guardo//
$_SESSION['messaje'] = "se elimino la tarea";
$_SESSION['messaje_type'] = 'danger';

// que nos redireccione al index//
header("location: index.php");

}

?>