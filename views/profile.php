<?php include __DIR__ . '/includes/header.inc.php';?>
<section id="sec-profile">
<!-- After register : flash message : thanks for registering  -->
<!-- After Log in: flash message : You have logged in -->
    <div class="row">
    <div class="col-3 my-4 p-4" id="profile-side-nav" >
        <nav class="nav flex-column">
            <h4>Account Info</h4>
            <a href="#">My Profile</a>
            <a href="">My Orders</a>
            <a href="/?page=wishlist">My Wish List</a>
        </nav>
    </div>
    <div class="col-1"></div>
    <div  class="col-8 my-4" id="profile_info">
        <h1>Your Profile</h1>
        <?php foreach($customer as $key=>$value):?>
            <p><span class="text-capitalize font-weight-bold"><?=e($key)?></span>: <?=e($value)?></p>
        <?php endforeach;?>
    </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.inc.php'; ?>