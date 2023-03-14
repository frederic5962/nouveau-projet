<?php
// on demarre une session
session_start();

//on  inclut la connection a la base
require_once('connect.php');

$sql = 'SELECT * FROM `utilisateur`';

//on preppare la requete
$query = $db->prepare($sql);

//on execute la requete
$query->execute();

//on stock le resultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>

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
                      $_SESSION['erreur'] = "";
                    }
                    ?>
                    <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-success" role="alert">
                        '. $_SESSION['message'].'
                      </div>';
                      $_SESSION['message'] = "";
                    }
                ?>
                <h1>liste des uti</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Mdp</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        //on boucle sur la var result
                        foreach($result as $nom){
                        ?>
                            <tr>
                                <td><?= $nom['id']?></td>
                                <td><?= $nom['nom']?></td>
                                <td><?= $nom['prenom']?></td>
                                <td><?= $nom['email']?></td>
                                <td><?= $nom['mdp']?></td>
                                <td><a href="details.php?id=<?= $nom['id']?>">Voir</a> 
                                    <a href="edit.php?id=<?=$nom['id']?>">Modifier</a>
                                    <a href="delete.php?id=<?=$nom['id']?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Ajouter un utilisateur</a>
            </section>
        </div>
    </main>
</body>
</html>