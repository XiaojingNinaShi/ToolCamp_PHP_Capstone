<?php
declare(strict_types=1);
function insertCustomer(PDO $dbh, array $post):int
{
    try{
    //INSERT into database
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
    //this executes the INTSERT
    
    $stmt->execute($params);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return intval($dbh->lastInsertId()) ?? 0;
}


function oneCustomer(int $id, PDO $dbh):array
{
    try{
        $query = "SELECT 
            name,email,phone,address,city,province,postal_code,country
            FROM customers 
            WHERE customers.id=:id";
        //prepare the query
        $stmt = $dbh->prepare($query);
        //create param array
        $params = array(
            ':id' => intval($id)
        );
        //execute the query
        $stmt->execute($params);
        $customer = $stmt->fetch();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return (is_array($customer)) ? $customer : [];
}



function getUserByEmail($email)
{
    global $dbh;
    $query = "SELECT id, email, password FROM customers WHERE email = :email LIMIT 1";
    $stmt = $dbh->prepare($query);
    $params = array (
        ':email' => $email
    );
    $stmt->execute($params);
    return $stmt->fetch();
}