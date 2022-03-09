<?php

/* iniciar secion*/
session_start(); // podemos guardar datos //





/*  coneccion a base de datos 
 */
 $com = mysqli_connect(
     'localhost',//donde esta, dominio o ip//
     'root',//usuario//
     '',//password//
     'php_mysql_crud' // nombre de la base de datos //

 );
 /*
  esto lo usamos para verificar que la base funciona 
 if(isset($conn)){
     echo 'db conect';
 }*/
 ?> 