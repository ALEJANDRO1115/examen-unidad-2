<?php
//database connection variables //variables de conectividad a la base de datos
   $host="localhost";   //host name //nombre del servidor
   $user="alex";        //username //nombre de usuario
   $password="kev1234"; //password //contraseña
   $database="kevbd";   //database name //nombre de la base de datos 

//create connection // crear la conexion
    $conn=new mysqli($host,$user,$password,$database);
    
 //check connection // verificar la conexion
     if($conn->connect_error) {
        die("connection failed:  ".$conn->connect_error);

    }
//establecer conexion la a base de datos /set the connection to the database
    $conn->set_charset("utf8mb4");  //set charset set to UTF-8// establecer el conjunto de caracteristicas a <UTF-8></UTF-8>

//echo "connecction successfuly to the database./conexion exitosa a la base de datos "; // conection successful message // mensaje de coneccion exitosa 


?> 