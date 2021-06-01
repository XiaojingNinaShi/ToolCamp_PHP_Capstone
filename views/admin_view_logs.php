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
        <h1 class="mb-3">Most Rencent 10 Logs</h1>
        <table class="table table-striped table-bordered">
            <?php
                for($i=0;$i<10;$i++){
                    $line = $log[$i]['event'];
                    echo "<tr><td>$line</td></tr>";
                }
            ?>
        </table>
    </div>
</div>
</section>
<?php include __DIR__ . '/includes/footer.inc.php'; ?>