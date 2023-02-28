<?php

$servername = "localhost";
$username = "root";
$password = "";

$database = "projetQR";

//create connexion
$conn = mysqli_connect($servername, $username, $password, $database);


if ($conn){
    echo "Succes vous etes connecter";
}else {
    echo ("error". mysqli_connect_error());
}


?>