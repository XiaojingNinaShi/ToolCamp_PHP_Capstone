<?php
declare(strict_types=1);
/**
 * Insert new registered user info into database
 *
 * @param PDO $dbh
 * @param array $post
 * @return integer
 */
function insertCustomer(PDO $dbh, array $post):int
{
    try{
    //INSERT into database. This is for register page.
    $query = "INSERT INTO
                customers
                (
                    name,email,password,phone,address,city,province,postal_code,country
                )
                VALUES
                (
                    :name,:email,:password,:phone,:address,:city,:province,:postal_code,:country
                )
                ";

    $stmt = $dbh->prepare($query);
    $params = array(
        ':name' => $post['name'],
        ':email' => $post['email'],
        ':password' => password_hash($post['password'], PASSWORD_DEFAULT),
        ':phone' => $post['phone'],
        ':address' => $post['address'],
        ':city' => $post['city'],
        ':province' => $post['province'],
        ':postal_code' => $post['postal_code'],
        ':country' => $post['country']
    );
    
    $stmt->execute($params);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return intval($dbh->lastInsertId()) ?? 0;
}


/**
 * Get user info by id. This is for profile page.
 *
 * @param integer $id
 * @param PDO $dbh
 * @return array
 */
function oneCustomer(int $id, PDO $dbh):array
{
    try{
        $query = "SELECT 
            name,email,phone,address,city,province,postal_code,country
            FROM customers 
            WHERE customers.id=:id";
 
        $stmt = $dbh->prepare($query);
        $params = array(
            ':id' => intval($id)
        );
        $stmt->execute($params);
        $customer = $stmt->fetch();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return (is_array($customer)) ? $customer : [];
}


/**
 * Get user info by email address. This is for sign in page.
 *
 * @param string $email
 * @return void
 */
function getUserByEmail(string $email)
{
    global $dbh;
    $query = "SELECT id, email, password, priv_level FROM customers WHERE email = :email LIMIT 1";
    $stmt = $dbh->prepare($query);
    $params = array (
        ':email' => $email
    );
    $stmt->execute($params);
    return $stmt->fetch();
}