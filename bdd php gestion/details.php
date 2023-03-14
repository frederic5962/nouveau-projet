<?php
// on demarre une session
session_start();

//est-ce que l'id existe et n'est pas vide dans l'url
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // on nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `utilisateur` WHERE `id` = :id;';

    // on prepapre la requete
    $query = $db->prepare($sql);

    //on accroche les params (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //on execute la requete 
    $query->execute();
    //on recupere l'utilisateur
    $nom = $query->fetch();

    //on verifie si le nom existe
    if(!$nom){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
    }

}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details du nom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails du nom <?= $nom['nom'] ?></h1>
                <p>ID: <?= $nom['id'] ?></p>
                <p>Nom: <?= $nom['nom'] ?></p>
                <p>Prenom: <?= $nom['prenom'] ?></p>
                <p>Email: <?= $nom['email'] ?></p>
                <p>Mdp: <?= $nom['mdp'] ?></p>
                <p><a href="index.php">Retour</a> <a href="edit.php?id=<?= $nom['id'] ?>">Modifier</a></p>
            </section>
        </div>
    </main>
</body>
</html>

