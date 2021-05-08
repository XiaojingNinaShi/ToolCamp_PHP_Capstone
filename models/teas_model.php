<?php
declare(strict_types=1);

function allTeas(PDO $dbh):array
{
    //write the query and test it in mysql
    $query = "SELECT
        teas.id, 
        teas.name,
        teas.price,
        teas.weight,
        teas.image
        FROM teas
        ORDER by teas.name";
    //prepare the query
    $stmt = $dbh->query($query);
    //execute the query
    $tea = $stmt->fetchAll();
    return $tea ?? [];
}

function oneTea(PDO $dbh, int $id):array
{
    //write the query and test it in mysql
    $query = "SELECT * FROM teas WHERE teas.id = :id";
    //prepare the query
    $stmt = $dbh->prepare($query);
    //create param array
    $params = array(
        ':id' =>intval($id)
    );
    //execute the query
    $stmt->execute($params);
    $tea = $stmt->fetch();
    return (is_array($tea)) ? $tea : [];
}


function allTypes(PDO $dbh):array
{
    $query = "SELECT DISTINCT teas.type as name FROM teas";
    $stmt = $dbh->query($query);
    return $stmt->fetchAll();
}

function allCaffeines(PDO $dbh):array
{
    $query = "SELECT DISTINCT teas.caffeine as name FROM teas";
    $stmt = $dbh->query($query);
    return $stmt->fetchAll();
}

function allTeasbyType(PDO $dbh, string $type):array
{
    $query = "SELECT
        teas.id, 
        teas.name,
        teas.price,
        teas.weight,
        teas.image,
        teas.type
        FROM teas
        WHERE teas.type = :type
        ORDER by teas.name";

    $stmt = $dbh->prepare($query);
    $params = array(
        ':type' => $type
    );
    $stmt->execute($params);
    return $stmt->fetchAll() ?? [];
}

function allTeasbyCaffeine(PDO $dbh, string $caffeine):array
{
    $query = "SELECT
        teas.id, 
        teas.name,
        teas.price,
        teas.weight,
        teas.image,
        teas.caffeine
        FROM teas
        WHERE teas.caffeine = :caffeine
        ORDER by teas.name";

    $stmt = $dbh->prepare($query);
    $params = array(
        ':caffeine' => $caffeine
    );
    $stmt->execute($params);
    return $stmt->fetchAll() ?? [];
}