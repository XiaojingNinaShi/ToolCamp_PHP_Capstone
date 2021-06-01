<?php require __DIR__ . '/includes/header.inc.php';?>
<section class="row" id="sec-checkout">

<div class="col-8">
<h1>Checkout</h1>

    <div class="bg-light mt-3"><h3>Payment Info</h3></div>
    <form action="/?page=handle_checkout" method="post" autocomplete="off" id="payment_form">
        <input type="hidden" name="csrf" value="<?=e($_SESSION['csrf'])?>">

        <div class="form-group">
            <label for="name_on_card">Name On Card</label>
            <input type="text" class="form-control" name="name_on_card" id="name_on_card" value="<?=e($post['name_on_card'] ?? '')?>">
            <div class="invalid-feedback d-block">
                <?=raw(error('name_on_card',$errors))?>    
            </div>      
        </div>

        <div class="form-group">
            <label for="card_number">Card Number</label>
            <input type="text" class="form-control" name="card_number" id="card_number" value="<?=e($post['card_number'] ?? '')?>">
            <div class="invalid-feedback d-block">
                <?=raw(error('card_number',$errors))?>    
            </div>      
        </div>

        <div class="form-group row">
            <div class="col-6">
                <label for="expire_date">Expire Date: (MM/YY)</label>
                <input type="text" class="form-control" name="expire_date" id="expire_date" value="<?=e($post['expire_date'] ?? '')?>">
                <div class="invalid-feedback d-block">
                    <?=raw(error('expire_date',$errors))?>    
                </div> 
            </div>
            <div class="col-6">
                <label for="security_code">Security Code:</label>
                <input type="text" class="form-control" name="security_code" id="security_code" value="<?=e($post['security_code'] ?? '')?>">
                <div class="invalid-feedback d-block">
                    <?=raw(error('security_code',$errors))?>    
                </div> 
            </div>     
        </div>
        
        <div class="form-group  d-flex justify-content-around">
            <button type="submit" class="btn col-3  btn-main">Place Order</button>
            <button type="reset" class="btn col-3  btn-main">Reset</button>
        </div>

    </form>
</div>

<div class="col-4">
</div>
</section>
<?php include __DIR__ . '/includes/footer.inc.php'; ?>