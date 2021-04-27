<?php include __DIR__ . '/includes/header.inc.php';?>
<section id="sec-profile">
    <h1 class="text-center">Thank you for registering!</h1>
    <div id="profile_info" class="py-4">
        <h4>You submitted the following information:</h4>
        <?php foreach($customer as $key=>$value):?>
            <p><span class="text-capitalize"><?=e($key)?></span>: <?=e($value)?></p>
        <?php endforeach;?>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.inc.php'; ?>