<?php require  __DIR__ . '/includes/header.inc.php'; ?>
<section id="sec-signin" class="d-flex justify-content-center py-5">
    <form action="/?page=verify_customer" method="post" id="sign-in-form">
        <h2>Sign In</h2>
        <?php require __DIR__ . '/includes/errors.php'; ?>
        <div class="form-group-row py-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?=e($post['email'] ?? '')?>">
        </div>
        <div class="form-group-row py-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="d-flex justify-content-center py-3">
            <button type="submit" class="btn col btn-main">Submit</button>
        </div>
    </form>
</section>
<?php require  __DIR__ . '/includes/footer.inc.php'; ?>