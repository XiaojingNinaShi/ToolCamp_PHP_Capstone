<?php if(count($errors)) : ?>
<div class="errors">
    <p>Please correct the following errors:</p>
    <ul>
    <?php foreach($errors as $error) : ?>
        <li><?=$error?></li>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>