<?php
require  __DIR__ . '/includes/header.inc.php'; 
?>
<div class="mb-5 d-flex justify-content-center"><img src="images/teas_main.jpg" alt="banner"></div>
<div class="row">
    <div class="col-5">
        <div class="d-flex justify-content-center"><img src="images/<?=e($tea['image'])?>" alt="tea-image"></div>
        <div class="mt-3">
            <p><?=e($tea['description'])?></p>
            <div class="row justify-content-center my-3">
                <a href="/?page=add_to_wish_list&tea=<?=e($tea['id'])?>" class="btn btn-outline-info col-9">Add to Wish List</a>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-6">
        <h2><?=e($tea['name'])?></h2>
        <div>
            <?php if(e($tea['type']) == 'green') :?>
                <span class="badge badge-success">Green Tea</span>
            <?php elseif (e($tea['type']) == 'black') :?>
                <span class="badge badge-danger">Black Tea</span>
            <?php elseif (e($tea['type']) == 'herbal') :?>
                <span class="badge badge-warning">Herbal</span>
            <?php elseif (e($tea['type']) == 'white') :?>
                <span class="badge badge-secondary">White</span>
            <?php elseif(e($tea['type']) == 'oolong') :?>
                <span class="badge badge-info">Oolong Tea</span>
            <?php elseif (e($tea['type']) == 'rooibos') :?>
                <span class="badge badge-dark">Rooibos Tea</span>
            <?php elseif (e($tea['type']) == 'pu\'erh') :?>
                <span class="badge badge-primary">Pu'erh</span>
            <?php endif ;?>
            <span class="mx-4">Caffeine Level: <?=e($tea['caffeine'])?></span>
            <span class="font-italic"><?= $tea['organic'] ? 'Organic' : ''; ?></span>
        </div>
        <div class="py-2">
            <h5>CAD$ <?=e($tea['price'])?> / <?=e($tea['weight'])?></h5>
        </div>

        <div class="my-3">
            <form action="/?page=add_to_bag" method="post" novalidate autocomplete="off" id="add_to_bag_form">
                <div class="d-flex justify-content-between">
                    <select class="form-control col-3" name="quantity">
                        <option selected="selected" value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <input type="hidden" name="tea_id" value="<?=e($tea['id'])?>">
                    <button type="submit" class="btn btn-main col-8">Add to Bag</button>
                </div>
            </form>
        </div>

        <div>
            <h5>Product Specifications</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Origins</td>
                        <td><?=e($tea['origin'])?></td>
                    </tr>
                    <tr>
                        <td>Ingredients</td>
                        <td><?=e($tea['ingredients'])?></td>
                    </tr>
                    <tr>
                        <td>Expire Date</td>
                        <td><?=e($tea['expire_date'])?></td>
                    </tr>
                    <tr>
                        <td>Product No.</td>
                        <td><?=e($tea['SKU'])?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require  __DIR__ . '/includes/footer.inc.php'; ?>
