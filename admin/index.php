<?php
include "../includes/init.php";

if (!isset( $_SESSION["est_connecte"] )) {
    header("location: connexion.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard admin</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <h1>Zone Administrative</h1>
    <div class="grille">
        <div class="bouton">
            <a call="pastille_link" href="/admin/plats/index.php">
                <div class="pastille">
                    <img class="plats" src="../icons/cutlery_308556.png" alt="">
                </div>
            </a>
            <a class="title" href="/admin/plats/index.php">Gérer les repas</a>
        </div>
        <div class="bouton">
            <a call="pastille_link" href="/admin/plats/index.php">
                <div class="pastille">
                    <img class="vin" src="../icons/wine_1150295.png" alt="">
                </div>
            </a>
            <a class="title" href="/admin/plats/index.php">Gérer les vins</a>
        </div>
        <div class="bouton">
            <a call="pastille_link" href="/admin/plats/index.php">
                <div class="pastille">
                    <img class="livre" src="../icons/open-book_2702162.png" alt="">
                </div>
            </a>
            <a class="title" href="/admin/plats/index.php">Gérer les réservations</a>
        </div>
    </div>
</body>

</html>