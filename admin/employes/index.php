<?php
include "../../includes/init.php";

if (!isset( $_SESSION["est_connecte"] )) {
    header("location: ../connexion.php");
}

if (!empty($_GET["supprimer"])) {
    $sql = "
        DELETE FROM employes
        WHERE id = :id
    ";

    $stmt = $bdd->prepare($sql);
    $stmt ->execute([
        ":id" => $_GET["supprimer"],
    ]);

    header("location: index.php");
}


$employes = selectAll("employes","*","nom ASC");
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
        <h1>Gestions des employés</h1>
        
        <div class="nav">
            <h2>Liste des employés</h2>
            
            <p>
                <a class= "ajoute" href="ajoute.php">Ajouter un élément au menu</a>
            </p>
        </div>
        <div class="box">
            <?php foreach ($employes as $employe): ?>
                <div class="menu">
                    <p class="name"><?= $employe["nom"] ?></p>
                    <p><?= $employe["courriel"] ?></p>
                    <p><?= $employe["position"] ?></p>
                    <div class="link">
                        <a href="modifier.php?id=<?= $employe["id"]?>">Modifier</a>
                        <a href="index.php?supprimer=<?= $employe["id"]?>">Supprimer</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="boiteRetour">
            <a class="retour" href="../index.php">Retour</a>
        </div>
        
    </div>
</body>
</html>