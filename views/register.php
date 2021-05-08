<?php include __DIR__ . '/includes/header.inc.php';?>
<section id="sec-register">
    <h1 class="text-center">Register Form</h1>

    <form action="/?page=handle_register" method="post" novalidate autocomplete="off" id="register_form">
        <p>Please fill in all fields to be successfully registered.</p>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?=e($post['name'] ?? '')?>">
            <div class="invalid-feedback d-block">
                <?=raw(error('name',$errors))?>    
            </div>      
        </div>

        <div class="form-group">
            <label for="address">Address(street)</label>
            <input type="text" class="form-control" name="address" id="address"value="<?=e($post['address'] ?? '')?>" >
            <div class="invalid-feedback d-block">
                <?=raw(error('address',$errors))?>
            </div>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" value="<?=e($post['city'] ?? '')?>">
            <div class="invalid-feedback d-block">
                <?=raw(error('city',$errors))?>
            </div>
        </div>

        <div class="form-group">
            <label for="province">Province</label>
            <input type="text" class="form-control" name="province" id="province" value="<?=e($post['province'] ?? '')?>">
            <div class="invalid-feedback d-block">
                <?=raw(error('province',$errors))?>
            </div>
        </div>

        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?=e($post['postal_code'] ?? '')?>">
            <div class="invalid-feedback d-block">
                <?=raw(error('postal_code',$errors))?>
            </div>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <select name="country" id="country" class="form-control">
                <option value="canada" <?=(!empty($post['country']) && $post['country']==='canada') ? 'selected' : '';?>>Canada</option>
                <option value="usa" <?=(!empty($post['country']) && $post['country']==='usa') ? 'selected' : '';?>>USA</option>
            </select>
            <div class="invalid-feedback d-block">
                <?=raw(error('country',$errors))?>
            </div>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?=e($post['phone'] ?? '')?>">
            <div class="invalid-feedback d-block">
                <?=raw(error('phone',$errors))?>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?=e($post['email'] ?? '')?>">
            <div class="invalid-feedback d-block">
                <?=raw(error('email',$errors))?>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <div class="invalid-feedback d-block">
                <?=raw(error('password',$errors))?>
            </div>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
            <div class="invalid-feedback d-block">
                <?=raw(error('confirm_password',$errors))?>
            </div>
        </div>

        <div class="form-group  d-flex justify-content-around">
            <button type="submit" class="btn col-3  btn-main">Submit</button>
            <button type="reset" class="btn col-3  btn-main">Reset</button>
        </div>
    </form>

</section>
<?php require __DIR__ . '/includes/footer.inc.php'; ?>