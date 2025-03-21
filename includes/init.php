<?php

include "bdd.php";
/*
*  Selectionne toutes les entrées
*/
session_start();

date_default_timezone_set("America/Toronto");

function selectAll($nom_table, $colonnes = "*" ,$order = "")
{
    global $bdd;
    $sql = "
        SELECT $colonnes
        FROM $nom_table
        
    ";
    if ($order != "")
    {
        $sql.= "ORDER BY $order";
    }

    $stmt = $bdd->prepare($sql);
    $stmt->execute([]);
    return $stmt->fetchAll();
};

function selectById($nom_table, $id, $colonnes = "*")
{
    global $bdd;
    $sql = "
        SELECT $colonnes
        FROM $nom_table
        WHERE id = :id
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([":id" => $id]);
    return $stmt->fetch();
}

function chargerImage($chemin)
{
    $extension = strtolower(pathinfo($chemin, PATHINFO_EXTENSION));
    switch ($extension) 
    {
        case "jpg": return imagecreatefromjpeg($chemin);
        case "jpeg": return imagecreatefromjpeg($chemin);
        case "png": return imagecreatefrompng($chemin);
        case "gif": return imagecreatefromgif($chemin);
        case "avif": return imagecreatefromavif($chemin);
        case "webp": return imagecreatefromwebp($chemin);
        default: return false;
    }
}
