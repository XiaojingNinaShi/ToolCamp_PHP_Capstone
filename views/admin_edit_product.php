<?php include __DIR__ . '/includes/header.inc.php';?>
<section class="admin-edit-product">
    <h1>Edit Product: <?=e($product['name'])?></h1>
        <form action="/?page=handle_admin_edit_product" enctype='multipart/form-data' method="post" novalidate autocomplete="off" class="mt-4">
        <!-- add token -->
        <input type="hidden" name="csrf" value="<?=e($_SESSION['csrf'])?>">
        <input type="hidden" name="id" value="<?=e($product['id'])?>">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" id="name" value="<?=e($product['name'] ?? '')?>">
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('name',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="price" id="price" value="<?=e($product['price'] ?? '')?>">
            </div>
            <div class="col-sm-5">
                <p>Correct to two decimal places</p>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('price',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="weight" class="col-sm-2 col-form-label">Weight</label>
            <div class="col-sm-5">
                <select class="form-control" name="weight" id="weight">
                    <option value="50g" <?=(!empty($product['weight']) && $product['weight']==='50g') ? 'selected' : '';?>>50g</option>
                    <option value="100g" <?=(!empty($product['weight']) && $product['weight']==='100g') ? 'selected' : '';?>>100g</option>
                    <option value="250g" <?=(!empty($product['weight']) && $product['weight']==='250g') ? 'selected' : '';?>>250g</option>
                </select>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('weight',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-5">
                <select class="form-control" name="type" id="type">
                    <option value="black" <?=(!empty($product['type']) && $product['type']==='black') ? 'selected' : '';?>>black</option>
                    <option value="green" <?=(!empty($product['type']) && $product['type']==='green') ? 'selected' : '';?>>green</option>
                    <option value="white" <?=(!empty($product['type']) && $product['type']==='white') ? 'selected' : '';?>>white</option>
                    <option value="herbal" <?=(!empty($product['type']) && $product['type']==='herbal') ? 'selected' : '';?>>herbal</option>
                    <option value="oolong" <?=(!empty($product['type']) && $product['type']==='oolong') ? 'selected' : '';?>>oolong</option>
                    <option value="pu\'erh" <?=(!empty($product['type']) && $product['type']==='pu\'erh') ? 'selected' : '';?>>pu'erh</option>
                    <option value="rooibos" <?=(!empty($product['type']) && $product['type']==='rooibos') ? 'selected' : '';?>>rooibos</option>
                </select>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('type',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="caffeine" class="col-sm-2 col-form-label">Caffeine</label>
            <div class="col-sm-5">
                <select class="form-control" name="caffeine" id="caffeine">
                    <option value="high" <?=(!empty($product['caffeine']) && $product['caffeine']==='high') ? 'selected' : '';?>>high</option>
                    <option value="medium" <?=(!empty($product['caffeine']) && $product['caffeine']==='medium') ? 'selected' : '';?>>medium</option>
                    <option value="low" <?=(!empty($product['caffeine']) && $product['caffeine']==='low') ? 'selected' : '';?>>low</option>
                    <option value="caffeine-free" <?=(!empty($product['caffeine']) && $product['caffeine']==='caffeine-free') ? 'selected' : '';?>>caffeine-free</option>
                </select>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('caffeine',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="origin" class="col-sm-2 col-form-label">Origin</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="origin" id="origin" value="<?=e($product['origin'] ?? '')?>">
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('origin',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="expire_date" class="col-sm-2 col-form-label">Expire Date</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="expire_date" id="expire_date" value="<?=e($product['expire_date'] ?? '')?>">
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('expire_date',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="organic" class="col-sm-2 col-form-label">Organic</label>
            <div class="col-sm-5">
                <select class="form-control" name="organic" id="organic">
                    <option value="1" <?=(!empty($product['organic']) && $product['organic']==='1') ? 'selected' : '';?>>yes</option>
                    <option value="0" <?=(!empty($product['organic']) && $product['organic']==='0') ? 'selected' : '';?>>no</option>
                </select>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('organic',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="ingredients" class="col-sm-2 col-form-label">Ingredients</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="ingredients" id="ingredients" ><?=e($product['ingredients'] ?? '')?></textarea>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('ingredients',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="description" id="description"><?=e($product['description'] ?? '')?></textarea>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('description',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="sku" id="sku" value="<?=e($product['SKU'] ?? '')?>">
            </div>
            <div class="col-sm-5">
                <p>Format: ABC-1234567</p>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('sku',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-2">
                <img src="images/<?=e($product['image'])?>" alt="<?=e($product['name'])?>" style="width:50px;height:50px;">
            </div>

            <div class="col-sm-5">
                <input type="file" class="form-control-file" name="image" id="image" >
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('image',$errors))?>  
            </div>      
        </div>

        <div class="form-group col-sm-7 d-flex justify-content-around my-5">
            <button type="submit" class="btn btn-main">Update</button>
            <button type="reset" class="btn btn-main">Reset</button>
        </div>

    </form>

</section>
<?php include __DIR__ . '/includes/footer.inc.php'; ?>
