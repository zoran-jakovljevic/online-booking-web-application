<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "turisticka_agencija";

$db = mysqli_connect($host, $username, $password, $database);

    if(!$db==true){
     echo "Konekcija je neuspesna";
 }



?>