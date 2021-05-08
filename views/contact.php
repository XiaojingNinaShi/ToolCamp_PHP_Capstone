<?php require __DIR__ . '/includes/header.inc.php';?>
    <section class="row" id="sec-contact">

      <div class="col-3" id="contact-side-nav">
        <nav class="nav flex-column">
          <h5>Call Us</h5>
          <p>Manitoba: 204-123-6666 Toll Free: 1-888-2575</p>
          <h5>Open Hours</h5>
          <p>We are open Monday to Sunday from 11am to 9pm.</p>
          <h5>Address</h5>
          <p>Address: 123 Maple Street, Winnipeg MB </p>
        </nav>
      </div>

      <div class="col-1"></div>

      <div class="col">
        <h4 class="pb-3">How Can We Help You?</h4>
        <p>Your questions and comments are appreciated. You’ll find the answers to most of your questions in our <a href="#">Frequently Asked Questions</a></p>
        <!-- Here comes the form-->
        <form 
            id="contact_form"
            class="p-4"
            action="http://www.scott-media.com/test/form_display.php"
            method="post"
            autocomplete="on"
            style="max-width: 500px; border: 2px solid #298582;">

          <div class="mb-3 row">
            <label for="inputname" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
              <input class="form-control form-control-sm" type="text" id="inputname">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputemail" class="col-sm-4 col-form-label">Email Address</label>
            <div class="col-sm-8">
              <input class="form-control form-control-sm" type="email" id="inputemail">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputphone" class="col-sm-4 col-form-label">Phone Number</label>
            <div class="col-sm-8">
              <input class="form-control form-control-sm" type="text" id="inputphone">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputsubject" class="col-sm-4 col-form-label">Subject</label>
            <div class="col-sm-8">
              <input class="form-control form-control-sm" type="text" id="inputsubject">
            </div>
          </div>
          
          <div class="mb-3">
            <label for="inputmessage" class="form-label">Message</label>
            <textarea class="form-control" id="inputmessage" rows="5"></textarea>
          </div>

          <div class="row justify-content-around">
            <button class="btn col-4 btn-main" type="submit">Submit Form</button>
            <button class="btn col-4 btn-main" type="reset">Reset Form</button>
          </div>
        </form>
      </div>
    </section>    
    
<?php require __DIR__ . '/includes/footer.inc.php'; ?>