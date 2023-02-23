<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <title>Document</title>
</head>
<body style='background:#fff;'>
<a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
    <div id="content">

<!-- tester si l'utilisateur est connecté -->
<?php
session_start();
    if($_SESSION['username'] !== ""){
        $user = $_SESSION['username'];
    //affiche un message
    echo "Bonjour $user, vous etes connecté";
    }
    if(isset($_GET['deconnexion']))
    { 
    if($_GET['deconnexion']==true)
    { 
    session_unset();
    header("location:login.php");
    }
    }
    else if($_SESSION['username'] !== ""){
    $user = $_SESSION['username'];
     }
?>    
</div>
</body>
</html>

