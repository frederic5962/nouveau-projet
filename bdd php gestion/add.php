<?php
// on demarre une session
session_start();

if($_POST){
    //die('Ca marche');
    if(isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['prenom']) && !empty($_POST['prenom'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['mdp']) && !empty($_POST['mdp'])){
        //on  inclut la connection a la base
require_once('connect.php');

// on nettoie l'id envoyé
$nom = strip_tags($_POST['nom']);
$prenom = strip_tags($_POST['prenom']);
$email = strip_tags($_POST['email']);
$mdp = strip_tags($_POST['mdp']);

$sql = 'INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mdp`)VALUES
(:nom, :prenom, :email, :mdp);';

$query = $db->prepare($sql);

$query->bindValue(':nom', $nom, PDO::PARAM_STR);
$query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$query->bindValue(':email', $email, PDO::PARAM_STR);
$query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
// si (nombre)$query->binValue(':nombre', $nombre, PDO::PARAM_INT)

$query->execute();

$_SESSION['message'] = "produit ajouté";
require_once('close.php');
        header('Location: index.php');//ne fonctionne que si aucun message avant (pas de echo ni rien)
    }else{
       $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                        '. $_SESSION['erreur'].'
                      </div>';
                      $_SESSIOn['erreur'] = "";
                    }
                ?>
                <h1>Ajouter un nom</h1>
               <form method="post">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mdp</label>
                        <input type="text" id="mdp" name="mdp" class="form-control">
                    </div>
                    <button class="btn btn-primary">Envoyer</button>
               </form> 
            </section>
        </div>
    </main>
</body>
</html>