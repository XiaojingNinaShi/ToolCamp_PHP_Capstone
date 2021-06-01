<?php
declare(strict_types=1);

/**
 * Get all teas basic info, sort by name. This is for teas page.
 *
 * @param PDO $dbh
 * @return array
 */
function allTeas(PDO $dbh):array
{
    $query = "SELECT
        teas.id, 
        teas.name,
        teas.price,
        teas.weight,
        teas.image
        FROM teas
        WHERE deleted_at IS NULL
        ORDER by teas.name";

    $stmt = $dbh->query($query);
    $tea = $stmt->fetchAll();
    return $tea ?? [];
}

/**
 * Get all teas detailed info, sort by id. This is for Admin page.
 *
 * @param PDO $dbh
 * @return array
 */
function allTeasDetailedOrderById(PDO $dbh):array
{
    $query = "SELECT * FROM teas WHERE deleted_at IS NULL ORDER by teas.id";

    $stmt = $dbh->query($query);
    $tea = $stmt->fetchAll();
    return $tea ?? [];
}


/**
 * Get a certain tea info by id. This is for teainfo page.
 *
 * @param PDO $dbh
 * @param integer $id
 * @return array
 */
function oneTea(PDO $dbh, int $id):array
{
    //write the query and test it in mysql
    $query = "SELECT * FROM teas WHERE deleted_at IS NULL AND teas.id = :id";
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


/**
 * Get all types of teas.
 *
 * @param PDO $dbh
 * @return array
 */
function allTypes(PDO $dbh):array
{
    $query = "SELECT DISTINCT teas.type as name FROM teas WHERE deleted_at IS NULL";
    $stmt = $dbh->query($query);
    return $stmt->fetchAll();
}

/**
 * Get all caffeines levles.
 *
 * @param PDO $dbh
 * @return array
 */
function allCaffeines(PDO $dbh):array
{
    $query = "SELECT DISTINCT teas.caffeine as name FROM teas WHERE deleted_at IS NULL";
    $stmt = $dbh->query($query);
    return $stmt->fetchAll();
}

/**
 * Get all teas info by tea type
 *
 * @param PDO $dbh
 * @param string $type
 * @return array
 */
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
        AND
        deleted_at IS NULL
        ORDER by teas.name";

    $stmt = $dbh->prepare($query);
    $params = array(
        ':type' => $type
    );
    $stmt->execute($params);
    return $stmt->fetchAll() ?? [];
}

/**
 * Get all teas info by caffeine level
 *
 * @param PDO $dbh
 * @param string $caffeine
 * @return array
 */
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
        AND
        deleted_at IS NULL
        ORDER by teas.name";

    $stmt = $dbh->prepare($query);
    $params = array(
        ':caffeine' => $caffeine
    );
    $stmt->execute($params);
    return $stmt->fetchAll() ?? [];
}

/**
 * Search a product using fulltex. This is for front end customer search
 *
 * @param PDO $dbh
 * @param string $search_term
 * @return array
 */
function searchTea(PDO $dbh, string $search_term):array
{
    $query = "SELECT * FROM teas 
            WHERE deleted_at IS NULL
            AND
            MATCH(name, ingredients)
            AGAINST(:search_term IN NATURAL LANGUAGE MODE)";
    $stmt = $dbh->prepare($query);
    $params = array(
        ':search_term' => $search_term
    );
    $stmt->execute($params);
    return $stmt->fetchAll() ?? [];
}


/**
 * Search a product using like. This is for back end amdin search
 *
 * @param PDO $dbh
 * @param string $search_term
 * @return array
 */
function adminSearchTea(PDO $dbh, string $search_term):array
{
    $query = "SELECT * FROM teas 
            WHERE deleted_at IS NULL
            AND
            (name LIKE :search_term
            OR
            id LIKE :search_term
            OR 
            SKU LIKE :search_term)
            ";
    $stmt = $dbh->prepare($query);
    $params = array(
        ':search_term' => '%' . $search_term . '%'
    );
    $stmt->execute($params);
    return $stmt->fetchAll() ?? [];
}


/**
 * Add a product: admin add product page.
 *
 * @param PDO $dbh
 * @param array $post
 * @return integer
 */
function addTea(PDO $dbh, array $post):int
{
    try{
    $query = "INSERT INTO
                teas
                (
                    name,price,weight,type,caffeine,origin,expire_date,organic,ingredients,description,SKU,image
                )
                VALUES
                (
                    :name,:price,:weight,:type,:caffeine,:origin,:expire_date,:organic,:ingredients,:description,:SKU,:image
                )
                ";

    $stmt = $dbh->prepare($query);
    $params = array(
        ':name' => $post['name'],
        ':price' => $post['price'],
        ':weight' => $post['weight'],
        ':type' => $post['type'],
        ':caffeine' => $post['caffeine'],
        ':origin' => $post['origin'],
        ':expire_date' => $post['expire_date'],
        ':organic' => $post['organic'],
        ':ingredients' => $post['ingredients'],
        ':description' => $post['description'],
        ':SKU' => $post['sku'],
        ':image' => $post['image'] ?? 'default_tea_img.png'
    );
    
    $stmt->execute($params);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return intval($dbh->lastInsertId()) ?? 0;
}

function editTea(PDO $dbh, array $post):int
{
    try{
        $image = '';
        if(!empty($post['image'])){
            $image = 'image = :image,';
        }
        
        $query = "UPDATE teas
                SET
                name = :name,
                price = :price,
                weight = :weight,
                type = :type,
                caffeine = :caffeine,
                origin = :origin,
                expire_date = :expire_date,
                organic = :organic,
                ingredients = :ingredients,
                description = :description,
                {$image}
                SKU = :SKU
                WHERE
                teas.id = :id
                ";
    
        $stmt = $dbh->prepare($query);

        $params = array(
            ':name' => $post['name'],
            ':price' => $post['price'],
            ':weight' => $post['weight'],
            ':type' => $post['type'],
            ':caffeine' => $post['caffeine'],
            ':origin' => $post['origin'],
            ':expire_date' => $post['expire_date'],
            ':organic' => $post['organic'],
            ':ingredients' => $post['ingredients'],
            ':description' => $post['description'],
            ':SKU' => $post['sku'],
            ':id' => intval($post['id'])
        );

        if(!empty($post['image'])){
            $params[':image'] = $post['image'];
        }

        $stmt->execute($params);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return $stmt->rowCount();
}


function removeTea($dbh, $id):int
{
    $query = "UPDATE teas SET deleted_at = CURRENT_TIMESTAMP WHERE teas.id = :id";
    $stmt = $dbh->prepare($query);
    $params = array(
        ':id' =>intval($id)
    );
    $stmt->execute($params);
    return $stmt->rowCount();
}