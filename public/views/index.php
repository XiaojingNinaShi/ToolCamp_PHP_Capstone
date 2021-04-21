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
            <div class="card-header fs-5 fw-bold text-center">Lavender Earl Grey</div>
            <img class="p-4" src="images/lavender_earl_grey.jpg" alt=""/>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div  class="card-header fs-5 fw-bold text-center">Dragon Well</div>
            <img class="p-4" src="images/dragon_well.jpg" alt=""/>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-header fs-5 fw-bold text-center">Peach Oolong</div>
            <img class="p-4" src="images/peach_oolong.jpg" alt=""/>
          </div>
        </div>
      </div>

      <!--Services section-->
      <div class="mt-4"><h3>Services</h3></div>
      <div class="divider"><hr></div>

      <div class="row row-cols-1 row-cols-3 gx-5" id="services-wrapper">
        <div class="col">
          <div class="card border-0">
            <i class="bi bi-shop fs-1 text-center"></i>
            <div class="card-body">
              <h6 class="text-center">PICK UP AVAILABLE</h6>
              <p class="text-center fs-6">Get It Fast</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card border-0">
            <i class="bi bi-truck fs-1 text-center"></i>
            <div class="card-body">
              <h6 class="text-center">FREE DELIVERY</h6>
              <p class="text-center fs-6">Free Shipping Over $50</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card border-0">
            <i class="bi bi-gift fs-1 text-center"></i>
            <div class="card-body">
              <h6 class="text-center">SPECIAL GIFT WRAP</h6>
              <p class="text-center fs-6">Send a Sweet Surprise</p>
            </div>
          </div>
        </div>
      </div>
    </section>    

<?php require __DIR__ . '/includes/footer.inc.php'; ?>
    
