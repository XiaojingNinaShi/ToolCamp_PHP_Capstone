<?php require __DIR__ . '/includes/header.inc.php';?>
    <section id="sec-home">
      <!--Main image on the page-->
      <div class="main_image">
        <img src="images/home_main.jpg" class="img-fluid" alt="homoe_banner">
      </div>
      <!--New Arrivals section-->
      <div class="mt-4"><h3>New Arrivals</h3></div> 
      <div class="divider"><hr></div>

      <div class="row row-cols-1 row-cols-3 gx-5" id="new-arrivals-wrapper">
        <div class="col">
          <div class="card">
            <div class="card-header fw-bold text-center"><a href="/?page=teainfo&tea=13"><h4>Ginger Honey</h4></a></div>
            <img class="p-4" src="images/ginger_honey.jpg" alt=""/>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div  class="card-header fw-bold text-center"><a href="/?page=teainfo&tea=11"><h4>Pink Flamingo</h4></a></div>
            <img class="p-4" src="images/pink_flamingo.jpg" alt=""/>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-header fw-bold text-center"><a href="/?page=teainfo&tea=4"><h4>Cranberry Pear</h4></a></div>
            <img class="p-4" src="images/cranberry_pear.jpg" alt=""/>
          </div>
        </div>
      </div>

      <!--Services section-->
      <div class="mt-4"><h3>Services</h3></div>
      <div class="divider"><hr></div>

      <div class="row row-cols-1 row-cols-3 gx-5" id="services-wrapper">
        <div class="col">
          <div class="card border-0">
            <i class="bi bi-shop text-center"></i>
            <div class="card-body">
              <h6 class="text-center">PICK UP AVAILABLE</h6>
              <p class="text-center">Get It Fast</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card border-0">
            <i class="bi bi-truck text-center"></i>
            <div class="card-body">
              <h6 class="text-center">FREE DELIVERY</h6>
              <p class="text-center">Free Shipping Over $50</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card border-0">
            <i class="bi bi-gift text-center"></i>
            <div class="card-body">
              <h6 class="text-center">SPECIAL GIFT WRAP</h6>
              <p class="text-center">Send a Sweet Surprise</p>
            </div>
          </div>
        </div>
      </div>
    </section>    

<?php require __DIR__ . '/includes/footer.inc.php'; ?>
    
