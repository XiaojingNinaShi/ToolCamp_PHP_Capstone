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
        <h1 class="mb-3"><?=$title?></h1>
        <div class="row justify-content-between p-3">
            <div>
                <a href="/?page=admin_add_product" class="btn btn-primary mb-3">Add New Product</a>
            </div>

            <form action="/?page=handle_admin_search" method="post" class="form-inline">
                <input class="form-control mr-sm-2" type="search" name="search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>

        <table class="table border">
                <thead>
                    <tr class="table-light">
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product) : ?>     
                    <tr>
                        <td>
                            <img src="images/<?=e($product['image'])?>" alt="<?=e($product['name'])?>" style="width:50px;height:50px;">
                        </td>
                        <td><?=e($product['id'])?></td>
                        <td><?=e($product['name'])?></td>
                        <td><?=e($product['SKU'])?></td>
                        <td><?=e($product['price'])?></td>
                        <td><?=e($product['type'])?></td>
                        <td><a href="/?page=admin_edit_product&tea=<?=e($product['id'])?>" class="btn btn-sm btn-warning">Edit</a></td>
                        <td><a href="/?page=handle_admin_remove_product&tea=<?=e($product['id'])?>" class="btn btn-sm btn-danger">Remove</a></td>
                    </tr>
                    <?php endforeach ;?>
                </tbody>
            </table>
    </div>
</div>
</section>
<?php include __DIR__ . '/includes/footer.inc.php'; ?>