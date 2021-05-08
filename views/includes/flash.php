<?php if(count($flash) > 0) : ?>
    <?php foreach($flash as $key => $message) : ?>
    <div class="text-center alert alert-<?=e($key)?> flash">
        <span><?=e($message)?></span>
    </div>
    <?php endforeach; ?>
<?php endif; ?>