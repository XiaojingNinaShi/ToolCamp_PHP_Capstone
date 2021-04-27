<?php include __DIR__ . '/includes/header.inc.php';?>
<section id="sec-register">
    <h1 class="text-center">Register Form</h1>
    <!-- include the errors div -->

    <form action="<?=e(self())?>" method="post" novalidate autocomplete="off" id="register_form">
        <p>Please fill in all fields to be successfully registered.</p>
        <div class="form-group py-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?=e($post['name'] ?? '')?>">
            <?=raw(error('name',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="address">Address(street)</label>
            <input type="text" class="form-control" name="address" id="address"value="<?=e($post['address'] ?? '')?>" >
            <?=raw(error('address',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" value="<?=e($post['city'] ?? '')?>">
            <?=raw(error('city',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="province">Province</label>
            <input type="text" class="form-control" name="province" id="province" value="<?=e($post['province'] ?? '')?>">
            <?=raw(error('province',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="postal_code">Postal Code</label>
            <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?=e($post['postal_code'] ?? '')?>">
            <?=raw(error('postal_code',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="country">Country</label>
            <input type="text" class="form-control" name="country" id="country"value="<?=e($post['country'] ?? '')?>">
            <?=raw(error('country',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?=e($post['phone'] ?? '')?>">
            <?=raw(error('phone',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?=e($post['email'] ?? '')?>">
            <?=raw(error('email',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <?=raw(error('password',$errors))?>
        </div>

        <div class="form-group py-2">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
            <?=raw(error('confirm_password',$errors))?>
        </div>

        <div class="form-group py-2 d-flex justify-content-around">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form>

</section>
<?php require __DIR__ . '/includes/footer.inc.php'; ?>