<?php include __DIR__ . '/includes/header.inc.php';?>
<section id="sec-profile">
<!-- After register : flash message : thanks for registering  -->
<!-- After Log in: flash message : You have logged in -->
    <div class="row">
    <div class="col-3 my-4 p-4 user_side_nav">
        <nav class="nav flex-column">
            <h4>Account Info</h4>
            <a href="/?page=profile">My Profile</a>
            <a href="/?page=orders">My Orders</a>
            <a href="/?page=wishlist">My Wish List</a>
        </nav>
    </div>

    <div  class="col-9 my-4" id="profile_info">
        <h1>My Previous Orders</h1>
        <table class="table border my-4">
            <thead>
                <tr class="table-light">
                    <th>Order ID</th>
                    <th>Subtotal</th>
                    <th>GST</th>
                    <th>PST</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>View Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order) : ?>
                    
                <tr>
                    <td><?=e($order['id'])?></td>
                    <td><?=e($order['subtotal'])?></td>
                    <td><?=e($order['gst'])?></td>
                    <td><?=e($order['pst'])?></td>
                    <td><?=e($order['total'])?></td>
                    <td><?=e($order['order_date'])?></td>
                    <td><a href="/?page=orders" class="btn btn-sm btn-success">View</a></td>
                </tr>
                <?php endforeach ;?>
            </tbody>
        </table>
    </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.inc.php'; ?>