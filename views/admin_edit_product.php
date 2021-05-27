<?php include __DIR__ . '/includes/header.inc.php';?>
<section class="admin-edit-product">
    <h1>Edit Product</h1>
    <h3>Question: Better user form or table to do edit? (form?)</h3>
    <div class="row">
        <h2><?=e($product['name'])?></h2>
        
        <table class="table border">
            <thead>
                <tr class="table-light">
                    <th>Column</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Image</td>
                    <td><img src="images/<?=e($product['image'])?>" alt="<?=e($product['name'])?>" style="width:50px;height:50px;"></td>            
                </tr>
                <tr>
                    <td>ID</td>
                    <td><?=e($product['id'])?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?=e($product['name'])?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><?=e($product['price'])?></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><?=e($product['type'])?></td>
                </tr>
                <tr>
                    <td>caffeine</td>
                    <td><?=e($product['caffeine'])?></td>
                </tr>
        </table>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.inc.php'; ?>
