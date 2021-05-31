<?php include __DIR__ . '/includes/header.inc.php';?>
<section class="admin-add-product">
    <h1>Add New Product</h1>
    <p>Please fill in all fields to add a new product.</p>

    <form action="/?page=handle_admin_add_product" enctype='multipart/form-data' method="post" novalidate autocomplete="off">

        <input type="hidden" name="csrf" value="<?=e($_SESSION['csrf'])?>">

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" id="name" value="<?=e($post['name'] ?? '')?>">
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('name',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="price" id="price" value="<?=e($post['price'] ?? '')?>">
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
                    <option value="50g" <?=(!empty($post['weight']) && $post['weight']==='50g') ? 'selected' : '';?>>50g</option>
                    <option value="100g" <?=(!empty($post['weight']) && $post['weight']==='100g') ? 'selected' : '';?>>100g</option>
                    <option value="250g" <?=(!empty($post['weight']) && $post['weight']==='250g') ? 'selected' : '';?>>250g</option>
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
                    <option value="black" <?=(!empty($post['type']) && $post['type']==='black') ? 'selected' : '';?>>black</option>
                    <option value="green" <?=(!empty($post['type']) && $post['type']==='green') ? 'selected' : '';?>>green</option>
                    <option value="white" <?=(!empty($post['type']) && $post['type']==='white') ? 'selected' : '';?>>white</option>
                    <option value="herbal" <?=(!empty($post['type']) && $post['type']==='herbal') ? 'selected' : '';?>>herbal</option>
                    <option value="oolong" <?=(!empty($post['type']) && $post['type']==='oolong') ? 'selected' : '';?>>oolong</option>
                    <option value="pu\'erh" <?=(!empty($post['type']) && $post['type']==='pu\'erh') ? 'selected' : '';?>>pu'erh</option>
                    <option value="rooibos" <?=(!empty($post['type']) && $post['type']==='rooibos') ? 'selected' : '';?>>rooibos</option>
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
                    <option value="high" <?=(!empty($post['caffeine']) && $post['caffeine']==='high') ? 'selected' : '';?>>high</option>
                    <option value="medium" <?=(!empty($post['caffeine']) && $post['caffeine']==='medium') ? 'selected' : '';?>>medium</option>
                    <option value="low" <?=(!empty($post['caffeine']) && $post['caffeine']==='low') ? 'selected' : '';?>>low</option>
                    <option value="caffeine-free" <?=(!empty($post['caffeine']) && $post['caffeine']==='caffeine-free') ? 'selected' : '';?>>caffeine-free</option>
                </select>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('caffeine',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="origin" class="col-sm-2 col-form-label">Origin</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="origin" id="origin" value="<?=e($post['origin'] ?? '')?>">
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('origin',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="expire_date" class="col-sm-2 col-form-label">Expire Date</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="expire_date" id="expire_date" value="<?=e($post['expire_date'] ?? '')?>">
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('expire_date',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="organic" class="col-sm-2 col-form-label">Organic</label>
            <div class="col-sm-5">
                <select class="form-control" name="organic" id="organic">
                    <option value="1" <?=(!empty($post['organic']) && $post['organic']==='1') ? 'selected' : '';?>>yes</option>
                    <option value="0" <?=(!empty($post['organic']) && $post['organic']==='0') ? 'selected' : '';?>>no</option>
                </select>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('organic',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="ingredients" class="col-sm-2 col-form-label">Ingredients</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="ingredients" id="ingredients" placeholder="<?=e($post['ingredients'] ?? '')?>"></textarea>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('ingredients',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="description" id="description" placeholder="<?=e($post['description'] ?? '')?>"></textarea>
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('description',$errors))?>  
            </div>      
        </div>

        <div class="form-group row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="sku" id="sku" value="<?=e($post['sku'] ?? '')?>">
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
            <div class="col-sm-5">
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <div class="invalid-feedback d-block ml-3">
                <?=raw(error('image',$errors))?>  
            </div>      
        </div>

        <div class="form-group col-sm-7 d-flex justify-content-around">
            <button type="submit" class="btn btn-main">Submit</button>
            <button type="reset" class="btn btn-main">Reset</button>
        </div>

    </form>




</section>
<?php include __DIR__ . '/includes/footer.inc.php'; ?>