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
    $query = "SELECT * FROM teas ORDER by teas.id";

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


/**
 * Get all types of teas.
 *
 * @param PDO $dbh
 * @return array
 */
function allTypes(PDO $dbh):array
{
    $query = "SELECT DISTINCT teas.type as name FROM teas";
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
    $query = "SELECT DISTINCT teas.caffeine as name FROM teas";
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
        ORDER by teas.name";

    $stmt = $dbh->prepare($query);
    $params = array(
        ':caffeine' => $caffeine
    );
    $stmt->execute($params);
    return $stmt->fetchAll() ?? [];
}


function searchTea(PDO $dbh, string $search_term):array
{
    $query = "SELECT * FROM teas 
            WHERE MATCH(name, ingredients)
            AGAINST(:search_term IN NATURAL LANGUAGE MODE)";
    $stmt = $dbh->prepare($query);
    $params = array(
        ':search_term' => $search_term
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
                name=:name,
                price=:price,
                weight=:weight,
                type=:type,
                caffeine=:caffeine,
                origin=:origin,
                expire_date=:expire_date,
                organic=:organic,
                ingredients=:ingredients,
                description=:description,
                SKU:SKU,
                {$image}
                WHERE
                id=:id";
    
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
            ':id' => $post['id']
        );

        if(!empty($post['image'])){
            $params[':image'] = $post['image'];
        }
        
        dd($query);
        dd($params);
        die;

        $stmt->execute($params);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return $stmt->rowCount();
}


function deleteTea():array
{
    
}