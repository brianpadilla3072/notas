<!---   video 
https://www.youtube.com/watch?v=pn2v9lPakHQ
1:03:00--->
<?php
include("bd.php") 

/* podemos verificar la paginaentrandoa :
    http://localhost/notas%20proect/index.php
    
    podemos verificar la coneccion con base de datos:
        http://localhost/notas%20proect/bd.php */

?>
<?php include("includes/header.php")?>
 <!--head de inicio de la pagina -->

       <div class="container p-4">
            <div class="row">
                <div class="col-md-4">


                    <!-- validacion para ver datos guardados-->
                    <?php if(isset($_SESSION['messaje'])) {?>
                        <!-- verifica si en session existe un mensage --->
                        <div class="alert alert-<?= $_SESSION['messaje_type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['messaje']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php 
                    // limpia los datos que tenemos en secion  //
                    session_unset(); 
                    } ?>

                    <div class="card card-body">
                        <!-- creamosuna tarjeta -->
                        <form action="save_task.php" method="POST"><!-- accion le dice donde va a enviar y a traves de que metodo -->
                            <!-- agrupamos formularios-->
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" 
                                 placeholder=" task title" autofocus></input>
                            </div>
                            <div class="form-group">
                               <textarea name="description"  rows="2" class="form-control" placeholder=" task description"></textarea> 
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="save_task" value="save task"></input>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>title</th>
                               <th>desctipcion</th>
                               <th>fecha</th>
                               <th>accion</th>
                           </tr>
                       </thead>
                       <tbody>
                    <!--- consulta a la base de datos ->
                       <?php
                       //pedimos todas las tareas que vienen de tabla "task
                       $query = "SELECT * FROM  talsk";
                       // pedimos a la base de datos la consulta y lo guARDAMOS en una vriable 
                        $consulta_talsk = mysqli_query($com,$query);
                       
                        while($row = mysqli_fetch_array($consulta_talsk)){ ?>
                            <!-  este while va a recorrer mis tareas, y va a
                             guardar  los  dato en una fila (row)--> 
                        <tr>
                            <td> <?php echo $row['title']?></td>
                            <td> <?php echo $row['description']?></td>
                            <td> <?php echo $row['created_at']?></td>
                            <td>
                                <!--  ingresamos aca los botones -->
                                <a class="btn btn-warning" href="edit.php?id=<?php echo $row['id']?>">Editar</a>
                                <a class="btn btn-danger" href="borrar_nota.php?id=<?php echo $row['id']?>">Borrar</a>
                            </td>
                        </tr>

                        <?php }?>

                       </tbody>
                   </table> 
                </div>
            </div>
       </div>
       

<?php include("includes/footer.php")?> 
 <!--body de inicio de la pagina -->