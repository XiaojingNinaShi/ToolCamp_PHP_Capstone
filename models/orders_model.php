<?php
declare(strict_types=1);

/**
 * all orders. This is for admin view orders page
 *
 * @param PDO $dbh
 * @return array
 */
function allOrders(PDO $dbh):array
{
    $query = "SELECT * FROM orders ORDER by order_date DESC";
    $stmt = $dbh->query($query);
    $orders = $stmt->fetchAll();
    return $orders ?? [];
}


function allOrdersForOneCustomer($customer_id):array
{
    global $dbh;
    $query = "SELECT * FROM orders 
        WHERE customer_id = :customer_id 
        ORDER by order_date DESC";
    $stmt = $dbh->prepare($query);
    $params = [':customer_id' => intval($customer_id)];
    $stmt->execute($params);
    $orders = $stmt->fetchAll();
    return $orders ?? [];
}


/**
 * Get one order info by order_id
 *
 * @param PDO $dbh
 * @param int $id
 * @return array
 */
function oneOrder($order_id):array
{
    global $dbh;
    $query = "SELECT * FROM orders WHERE id = :order_id";
    $stmt = $dbh->prepare($query);
    $params = [':order_id' => intval($order_id)];
    $stmt->execute($params);
    $order = $stmt->fetch();
    $order['teas'] = getTeasForOrder($order['id']);
    return $order ?? [];
}

function getTeasForOrder($order_id) 
{
    global $dbh;
    $query = "SELECT * FROM orders 
                JOIN order_tea on orders.id = order_tea.order_id
                WHERE
                order_tea.order_id = :order_id";
    $stmt = $dbh->prepare($query);
    $params = array(
        ':order_id' => intval($order_id)
    );
    $stmt->execute($params);
    return $stmt->fetchAll();
}



// function allOrdersDetails(PDO $dbh):array
// {
//     $query = "SELECT 
//         orders.id as order_id, 
//         orders.order_date, 
//         orders.subtotal, 
//         orders.gst, 
//         orders.pst, 
//         orders.total, 
        
//         order_tea.tea_id as tea_id,
//         order_tea.unit_price, 
//         order_tea.quantity, 
//         order_tea.line_price, 
        
//         customers.name as customer, 
        
//         teas.name as teas
        
//         FROM orders, order_tea, customers, teas

//         WHERE
//         orders.id = order_tea.order_id
//         AND
//         orders.customer_id = customers.id
//         AND
//         teas.id = order_tea.tea_id
//         "

//     $stmt = $dbh->query($query);
//     $orders = $stmt->fetchAll();
//     return $orders ?? [];
// }

/**
 * Insert New Order
 *
 * @param PDO $dbh
 * @param array $order
 * @return integer
 */
function insertOrder(PDO $dbh, array $order):int
{
    try{
        $dbh -> beginTransaction();
        //INSERT into Orders table
        $query = "INSERT INTO
                orders
                (customer_id, subtotal, gst, pst, total)
                VALUES
                (:customer_id, :subtotal, :gst, :pst, :total)
                ";

        $stmt = $dbh->prepare($query);
        $params = array(
            ':customer_id' => $order['customer_id'], 
            ':subtotal' => $order['subtotal'], 
            ':gst' => $order['gst'], 
            ':pst' => $order['pst'], 
            ':total' => $order['total']
        );
        $stmt->execute($params);
        $order_id = $dbh->lastInsertId();
        if(!$order_id) throw new Exception('Could not insert order');

        //Insert into order_tea table
        $query = "INSERT INTO 
                order_tea (order_id, tea_id, unit_price, quantity, line_price) 
                values 
                (:order_id, :tea_id, :unit_price, :quantity, :line_price)";

        $stmt = $dbh->prepare($query);

        // loop through $users, insert into user_list
        foreach($order['teas'] as $tea) {
            $params = array (
                ':order_id' => intval($order_id),
                ':tea_id' => $tea['id'],
                ':unit_price' => $tea['price'],
                ':quantity' => $tea['qty'],
                ':line_price' => $tea['price'] * $tea['qty'],
            );
        $stmt->execute($params);
        }

        // If we get to this point, everything worked
        $dbh->commit();
        return intval($order_id);

    }catch (Exception $e) {
        $dbh->rollBack();
        echo $e->getMessage();
    }
}

