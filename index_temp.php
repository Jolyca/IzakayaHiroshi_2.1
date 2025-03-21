<?php

include "includes/init.php";

$plats = selectAll("plats","*","nom ASC"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de donnés</title>
</head>
<body>
    <ul>
        <?php foreach ($plats as $plat): ?>
        <li>
            <strong><?= $plat["nom"] ?></strong> <?= $plat["prix"] ?>
        </li>
        <?php endforeach ?>    
    </ul>
</body>
</html>