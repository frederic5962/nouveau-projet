<?php

try{
    //connection a la base
    $db = new PDO('mysql:host=localhost;dbname=histoire' , 'root' , '');
    $db->exec('SET NAMES "UTF8"');

}catch(PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}

?>