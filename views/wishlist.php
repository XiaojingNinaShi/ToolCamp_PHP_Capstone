<?php 
include __DIR__ . '/includes/header.inc.php';
$products = $wish_list;
?>
<section id="sec-wish-list">
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
        <div class="col-1"></div>

        <div  class="col-8 my-4" id="profile_info">
            <h1>My Wish List</h1>
            <?php if(count($products) == 0) : ?>
                    <h5>You haven't added any items to your bag yet.</h5>
                    <p><a href="/?page=teas" class="btn btn-main">Shop Now</a></p>
            <?php else : ?>
                <table class="table border">
                    <thead>
                        <tr class="table-light">
                            <th>Product</th>
                            <th>Price/unit</th>
                            <th>Remove</th>
                            <th>Add to Bag</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- APPEND HERE -->
                        <?php foreach($products as $product) : ?>
                        <tr>
                            <td class="mx-3">
                                <!-- ISSUE: CAN NOT ADD IMAGE -->
                                <?=e($product['name'])?>
                            </td>
                            <td>$<?=e($product['price'])?></td>
                            <td><a href="/?page=remove_from_wish_list&tea=<?=e($product['id'])?>" class="btn btn-sm btn-danger">Remove</a></td>
                            <td>
                                <form action="/?page=add_to_bag" method="post" novalidate autocomplete="off">
                                    <input type="hidden" name="tea_id" value="<?=e($product['id'])?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-sm btn-success">Add</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ;?>

                    </tbody>
                </table>
            <?php endif;?>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.inc.php'; ?>