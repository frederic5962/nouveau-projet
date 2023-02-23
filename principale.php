<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style='background:#fff;'>

    <div id="content">

<!-- tester si l'utilisateur est connecté -->
<?php
session_start();
    if($_SESSION['username'] !== ""){
        $user = $_SESSION['username'];
    //affiche un message
    echo "Bonjour $user, vous etes connecté";
    }
?>    
</div>
</body>
</html>

