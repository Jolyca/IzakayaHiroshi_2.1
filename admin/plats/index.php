<?php
include "../../includes/init.php";

if (!isset( $_SESSION["est_connecte"] )) {
    header("location: ../connexion.php");
}

if (!empty($_GET["supprimer"])) {
    $sql = "
        DELETE FROM plats
        WHERE id = :id
    ";

    $stmt = $bdd->prepare($sql);
    $stmt ->execute([
        ":id" => $_GET["supprimer"],
    ]);

    header("location: index.php");
}


$plats = selectAll("plats","*","nom ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <div class="all">
        <h1>Gestions des repas</h1>
        
        <div class="nav">
            <h2>Liste des repas</h2>
            
            <p>
                <a class= "ajoute" href="ajoute.php">Ajouter un élément au menu</a>
            </p>
        </div>
        <div class="box">
            <?php foreach ($plats as $plat): ?>
                <div class="menu">
                    <p class="name"><?= $plat["nom"] ?></p>
                    <p><?= $plat["prix"] ?></p>
                    <!-- <img src="<?= $plat["image"]?>" alt=""> -->
                    <div class="link">
                        <a href="modifier.php?id=<?= $plat["id"]?>">Modifier</a>
                        <a href="index.php?supprimer=<?= $plat["id"]?>">Supprimer</a>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
    </div>
</body>
</html>