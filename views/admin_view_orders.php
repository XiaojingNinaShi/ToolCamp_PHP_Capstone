<?php include __DIR__ . '/includes/header.inc.php';?>
<section id="sec-profile">
<div class="row">
    <div class="col-3 my-4 p-4" id="admin-side-nav" >
        <nav class="nav flex-column">
            <h4>Dashboard</h4>
            <a href="/?page=admin_view_products">View Products</a>
            <a href="/?page=admin_view_customers">View Customers</a>
            <a href="/?page=admin_view_orders">View Orders</a>
            <a href="/?page=admin_view_logs">View Logs</a>
        </nav>
    </div>

    <div  class="col-9 my-4" id="profile_info">
        <h1 class="mb-3">All Orders</h1>
        <table class="table border">
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
                    <td><a href="/?page=admin_view_order&tea=<?=e($order['id'])?>" class="btn btn-sm btn-success">View</a></td>
                </tr>
                <?php endforeach ;?>
            </tbody>
        </table>
    </div>
</div>
</section>
<?php include __DIR__ . '/includes/footer.inc.php'; ?>