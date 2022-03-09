<?php
include("bd.php");


if(isset($_GET['id'])){

    $id = $_GET['id'];// GUARDAMOS EL ID

    $query = "SELECT * FROM talsk WHERE id = $id"; //selecciona de la tabla talsk, la que tenga el id igual a $id//

    $result = mysqli_query($com,$query);

    if(mysqli_num_rows($result) == 1){// si los resultados es almenos 1 //
       $row = mysqli_fetch_array($result); // guardamoos las filas en un array//
       $title = $row['title'];
       $description = $row['description'];

    }
}
// validamos que el usuario precionoel boton de guardar//

if(isset($_POST['update'])) {
// si existe atravez del metodo $_post, el nonbre llamado post  //

    $id = $_GET['id']; // obtenemos el id de la url //

    $title = $_POST['title'];
    $description = $_POST['description'];

   $query = " UPDATE talsk set title='$title', description='$description' WHERE id='$id'  ";
   mysqli_query($com,$query);
   $_SESSION['messaje'] = "Editaste la Nota";
    $_SESSION['messaje_type'] = 'warning';

   header("location: index.php");

}
?>
<?php include("includes/header.php")?>

<div class="container p-4 ">

    <div class="row">

        <div class="col-md-4 mx-auto">

            <div class="card card-body">
                <!--  ELFORMULARIO VA A ENVIAR UN LINK CON EL ID POR EL METODO POST -->

                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <!---  editar titulo --->
                    <div class="form-group">
                        <input class="form-control " type="text" name="title" placeholder="Actualiza el title." value="<?php echo $title;?>">
                    </div>
                  <!---  editar descripcion --->
                    <div class="form-group">
                        <textarea class="form-control" placeholder=" Cambie La descripcion" name="description"  rows="2"><?php echo $description;?></textarea>
                    </div>

                    <button class="btn btn-success" name="update">Guardar</button>


                </form>

            </div>

        </div>

    </div>

</div>



<?php include("includes/footer.php")?>