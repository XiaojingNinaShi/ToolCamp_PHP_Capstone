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
        <h1 class="mb-3">All Customers</h1>
        <table class="table-responsive table-striped border" id="admin-view-customers-table">
            <thead>
                <tr class="table-light">
                    <th  class="pl-2" style="min-width:40px">ID</th>
                    <th style="min-width:120px">Name</th>
                    <th>Email</th>
                    <th style="min-width:40px">Age</th>
                    <th style="min-width:120px">Phone</th>
                    <th style="min-width:250px">Full Address</th>
                    <th style="min-width:100px">Postal Code</th>
                    <th>Privilege</th>
                    <th style="min-width:120px">Registered At</th>
                    <th class="pr-2">Edit</th>
                    <th class="pr-2">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $customer) : ?>
                <tr>
                    <td class="pl-2"><?=e($customer['id'])?></td>
                    <td><?=e($customer['name'])?></td>
                    <td><?=e($customer['email'])?></td>
                    <td>
                        <?php if (is_null($customer['age'])) : ?>
                            N/A
                        <?php else :?>
                            <?=e($customer['age'])?>
                        <?php endif;?>
                    </td>
                    <td><?=e($customer['phone'])?></td>
                    <td><?=e($customer['address'] .' '. $customer['city'] .' '. $customer['province'] .' '. $customer['country'] )?></td>
                    <td><?=e($customer['postal_code'])?></td>
                    <td>
                        <?php if (e($customer['priv_level']) == 1) : ?>
                            Admin
                        <?php else :?>
                            User
                        <?php endif;?>
                    </td>
                    <td><?=e($customer['created_at'])?></td>
                    <td class="pr-2"><a href="#" class="btn btn-sm btn-warning">Edit</a></td>
                    <td class="pr-2"><a href="#" class="btn btn-sm btn-danger">Remove</a></td>
                </tr>
                <?php endforeach ;?>
            </tbody>
        </table>
    </div>
</div>
</section>