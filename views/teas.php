<?php require __DIR__ . '/includes/header.inc.php';?>
    <section id="sec-teas">
      <!--Main image on the page-->
      <div class="main_image">
        <img src="images/home_main.jpg" class="img-fluid" alt="homoe_banner">
      </div>
      <!--Shop all section-->
      <div class="mt-4"><h3><?=$title?></h3></div>
      <div class="divider"><hr></div>
      <!--Products images and information-->
      <div class="container">
        <div class="row">
          <div class="col-3" id="teas-side-nav">
          
            <h4>Tea Type</h4>
            <nav class="nav flex-column">
            <?php foreach ($types as $type) : ?>
                <a href="/?page=teas&type=<?=e($type['name'])?>"><?=ucwords($type['name'])?></a>
            <?php endforeach ; ?>
            </nav>
          
            <h4>Caffeine Level</h4>
            <nav class="nav flex-column">
            <?php foreach ($caffeines as $caffeine) : ?>
                <a href="/?page=teas&caffeine=<?=e($caffeine['name'])?>"><?=ucwords($caffeine['name'])?></a>
            <?php endforeach ; ?>
            </nav>
          
          </div>

          <div class="col">
            <div class="row" id="product-wrapper">
              <?php foreach($teas as $tea) : ?>
              <div class="col-4 mb-3">
                <div class="card">
                  <img src="images/<?=e($tea['image'])?>" class="card-img-top mx-auto d-block p-2" alt="<?=e($tea['name'])?>" style="width:200px;height:200px;">
                  <div class="card-body bg-light p-2">
                    <h6 class="card-title text-center font-weight-bold"><a href="/?page=teainfo&tea=<?=e($tea['id'])?>"><?=e($tea['name'])?></a></h6>
                    <p class="card-text text-center">$<?=e($tea['price'])?>/<?=e($tea['weight'])?></p>
                    <div class="row justify-content-around pb-1">
                      <span>
                        <a href="/?page=add_to_bag_from_main&tea=<?=e($tea['id'])?>"><i class="bi bi-bag-plus-fill"></i></a>
                      </span>
                      <span>
                        <a href="/?page=add_to_wish_list_from_main&tea=<?=e($tea['id'])?>"><i class="bi bi-suit-heart-fill"></i></a>
                      </span>
                    </div>

                  </div>
                </div>
              </div>
            <?php endforeach;?>
            </div>
          </div>

        </div>
      </div>
    </section>    

<?php require __DIR__ . '/includes/footer.inc.php';?>