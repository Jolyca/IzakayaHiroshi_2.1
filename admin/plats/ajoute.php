<?php

include "../../includes/init.php";

if (!isset( $_SESSION["est_connecte"] )) {
    header("location: ../connexion.php");
}

if (!empty($_POST)) {
    $nom = $_POST["nom"];
    $acoter = $_POST["acoter"];
    $prix = $_POST["prix"];
    $ingredients = $_POST["ingredients"];

    $image = $_FILES["image"];
    $erreur_upload = false;

    if ($image["error"] == 0) {
        $dossierUpload = "../../uploads/";
        $nom_fichier = date("h-i-s") . "_" . random_int(100000, 999999);
        
        $extension = pathinfo($image["name"], PATHINFO_EXTENSION);

        $cible = "$dossierUpload$nom_fichier.$extension";
        $cible_universel = "uploads/$nom_fichier.$extension";
        $supported_image = array('gif','jpg','jpeg','png','avif','webp');
        if (in_array($extension, $supported_image))
        {
            move_uploaded_file($image["tmp_name"], $cible);
        }
        else
        {
            $erreur_upload = true;
            echo " pas un format valide";
        }
    }
    else
    {
        $erreur_upload = true;
        echo " pas un format valide";
    }



    $sql = "
        INSERT INTO plats
            (nom,acoter,prix,ingredients,image)
        VALUES
            (:nom,:acoter,:prix,:ingredients,:image) 
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":nom" => $nom,
        ":acoter" => $acoter,
        ":prix" => $prix,
        ":ingredients" => $ingredients,
        ":image" => $cible_universel,
    ]);


    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un repas</title>
    <link rel="stylesheet" href="../../css/ajoute.css">

</head>

<body>
    <p>
        <a class="retour" href="index.php">Retour</a>
    </p>
    <h1>Ajouter</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="txt">
            <p>Nom:</p>
            <input type="text" name="nom">
        </div>

        <div class="txt">
            <p>Acoter:</p>
            <input type="text" name="acoter">
        </div>

        <div class="txt">
            <p>Prix:</p>
            <input type="text" name="prix">
        </div>

        <div class="txt">
            <p>Ingredients:</p>
            <input type="text" name="ingredients">
        </div>

        <div class="image">
            <p>image</p>
            <input type="file" name="image">
        </div>

        <div class="bouton">
            <p>
                <input type="submit" value="Ajouter">
            </p>
        </div>
    </form>
</body>

</html>