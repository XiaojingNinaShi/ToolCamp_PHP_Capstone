<?php require  __DIR__ . '/includes/header.inc.php'; ?>
<section id="sec-confirm-order">
    <h1>Confirm Order</h1>
    <div class="bg-light mt-3"><h3>1. Order Detail</h3></div>

    <div class="row">
        <div class="col-8">
            <table class="table table-striped border">
                <thead>
                    <tr class="table-light">
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($order['teas'] as $item) : ?>
                        
                    <tr>
                        <td><?=e(oneTea($dbh,$item['tea_id'])['name'])?></td>
                        <td><?=e($item['unit_price'])?></td>
                        <td><?=e($item['quantity'])?></td>  
                        <td><?=e($item['line_price'])?></td>  
                    </tr>
                    <?php endforeach ;?>
                </tbody>
            </table>
        </div>


        <div class="col-4">
        <div class="card">
                <div class="card-header"><h3 class="card-title">Order Summary</h3></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between my-1">
                        <span>Subtotal:</span>
                        <span>$<?=e($order['subtotal'])?></span>
                    </div>
                    <div class="d-flex justify-content-between my-1"><span>Estimated Shipping</span><span>$ 10.00</span></div>
                    <div class="d-flex justify-content-between my-1"><span>Estimated GST</span><span>$ <?=e($order['gst'])?></span></div>
                    <div class="d-flex justify-content-between my-1"><span>Estimated PST</span><span>$ <?=e($order['pst'])?></span></div>

                    <div class="divider"><hr></div>
                    <div class="d-flex justify-content-between" style="font-size:1.5em;">
                        <span>Total:</span>
                        <span>$ <?=e($order['total'])?></span>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

    <div class="bg-light mt-3"><h3>2. Delivery Info</h3></div>
    <div>
        <span><?=e($user['name'])?></span> </br>
        <span><?=e($user['address'])?></span> </br>
        <span><?=e($user['city'])?>, <?=e($user['province'])?> <?=e($user['postal_code'])?></span> </br>
        <span><?=e($user['country'])?></span> </br>
        <span><?=e($user['phone'])?></span>
    </div>

    <?php if(!empty($payment)) :?>
    <div class="bg-light mt-3"><h3>3. Payment Info</h3></div>
    <div>
        <span>Credit Card Ending With : <?=e(substr($payment['card_number'] ,-4))?></span> </br>
        <span>Name On Card: <?=e($payment['name_on_card'])?></span> </br>
        <span>Order Date: <?=e($order['order_date'])?></span>
    </div>
    <?php endif;?>

    <div class="mt-5 d-flex justify-content-center">
        <a href="/?page=orders" class="btn btn-main col-4">OK</a>
    </div>
</section>
<?php require  __DIR__ . '/includes/footer.inc.php'; ?>