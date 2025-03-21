<?php 

include("../includes/init.php");

if (!empty($_POST)) {
    $courriel = $_POST["courriel"];
    $mdp = $_POST["mdp"];

    $sql = "
        SELECT *
        FROM employes
        WHERE
            courriel = :courriel
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":courriel" => $courriel,
    ]);

    $employes = $stmt->fetch();

    $employes_existe = $employes != false;

    if ($employes_existe) {
        // Vérification mdp
        $mdp_valide = password_verify($mdp, $employes["mdp"]);

        if ($mdp_valide) {
            $_SESSION["est_connecte"] = true;
            header("location: index.php");
            exit;
        } else {
            $erreur = true;
        }
    } else {
        $erreur = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="connexion.php" method="post">
        <input name="courriel" type="text" placeholder="Courriel">
        <input name="mdp" type="password" placeholder="Mot de passe">
        <input type="submit" value="Connecter">
    </form>
</body>
</html>