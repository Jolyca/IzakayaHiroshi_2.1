<?php

include "bdd.php";
/*
*  Selectionne toutes les entrées
*/

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
