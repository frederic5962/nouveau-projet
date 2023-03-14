<?php
// on demarre une session
session_start();

//est-ce que l'id existe et n'est pas vide dans l'url
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // on nettoie l'id envoyé
    $id = strip_tags($_GET['id']);
    // attention Delete sans le WHERE cela supprime tt
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

     // attention Delete sans le WHERE cela supprime tt
     $sql = 'DELETE FROM `utilisateur` WHERE `id` = :id;';
 
     // on prepapre la requete
     $query = $db->prepare($sql);
 
     //on accroche les params (id)
     $query->bindValue(':id', $id, PDO::PARAM_INT);
 
     //on execute la requete 
     $query->execute();
     $_SESSION['message'] = "Nom supprimé";
     header('Location: index.php');
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
?>

