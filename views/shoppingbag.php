<?php require __DIR__ . '/includes/header.inc.php';?>
<section class="row" id="sec-shoppingbag">
        <div class="col-8">
            <h1>Shopping Bag</h1>

            <?php if(count($products) == 0) : ?>
                <h5>You haven't added any items to your bag yet.</h5>
                <p><a href="/?page=teas" class="btn btn-main">Shop Now</a></p>
            <?php else : ?>

            <table class="table border">
                <thead>
                    <tr class="table-light">
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Update Quantity</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- APPEND HERE -->
                    <?php foreach($products as $product) : ?>
                    <tr>
                        <td class="mx-3"><?=e($product['name'])?></td>
                        <td><?=e($product['qty'])?></td>
                        <td>$<?=e($product['price'])?></td>
                        <td>$<?=number_format(e($product['qty'] * $product['price']),2)?></td>
                        <td>
                            <form action="/?page=update_bag" method="post" novalidate autocomplete="off" id="add_to_bag_form">
                                <div class="d-flex justify-content-between">
                                    <select class="form-control mr-1" name="quantity">
                                        <option value="1" <?=(!empty($product['qty']) && $product['qty']==='1') ? 'selected' : '';?>>1</option>
                                        <option value="2" <?=(!empty($product['qty']) && $product['qty']==='2') ? 'selected' : '';?>>2</option>
                                        <option value="3" <?=(!empty($product['qty']) && $product['qty']==='3') ? 'selected' : '';?>>3</option>
                                        <option value="4" <?=(!empty($product['qty']) && $product['qty']==='4') ? 'selected' : '';?>>4</option>
                                        <option value="5" <?=(!empty($product['qty']) && $product['qty']==='5') ? 'selected' : '';?>>5</option>
                                        <option value="6" <?=(!empty($product['qty']) && $product['qty']==='6') ? 'selected' : '';?>>6</option>
                                        <option value="7" <?=(!empty($product['qty']) && $product['qty']==='7') ? 'selected' : '';?>>7</option>
                                        <option value="8" <?=(!empty($product['qty']) && $product['qty']==='8') ? 'selected' : '';?>>8</option>
                                        <option value="9" <?=(!empty($product['qty']) && $product['qty']==='9') ? 'selected' : '';?>>9</option>
                                    </select>
                                    <input type="hidden" name="tea_id" value="<?=e($product['id'])?>">
                                    <button type="submit" class="btn btn-sm btn-warning"><i class="bi bi-arrow-repeat"></i></button>
                                </div>
                            </form>
                        
                        </td>
                        <td><a href="/?page=remove_from_bag&tea=<?=e($product['id'])?>" class="btn btn-danger">Remove</a></td>
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
                        <span>$
                            <?php
                                $sum = 0;
                                foreach($products as $product){
                                    $line_price = $product['qty'] * $product['price'];
                                    $sum += $line_price;
                                }
                                echo number_format($sum,2);
                            ?>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between my-1"><span>Estimated Shipping</span><span>TBD</span></div>
                    <div class="d-flex justify-content-between my-1"><span>Estimated Sales Tax</span><span>TBD</span></div>

                    <div class="divider"><hr></div>
                    <div class="d-flex justify-content-between" style="font-size:1.5em;">
                        <span>Total:</span>
                        <span>$
                            <?php
                                $sum = 0;
                                foreach($products as $product){
                                    $line_price = $product['qty'] * $product['price'];
                                    $sum += $line_price;
                                }
                                echo number_format($sum,2);
                            ?>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                <a href="/?page=checkout" class="btn col btn-main">Check Out</a>
                </div>
            </div>
        </div>

        <?php endif ; ?>
    </section>
<?php require __DIR__ . '/includes/footer.inc.php';?>