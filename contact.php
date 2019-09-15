
<!--Section: Contact-->
<section style="padding: 4em 0em;background: rgba(205, 220, 57, 0.1);" id="contact">

  <section class="container-fluid">

    <!-- Heading -->
    <h2 class="mb-5 font-weight-bold text-center py-3">Contact us</h2>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-5 col-md-12">
        <div class="card">
          <div class="card-header white-text text-center py-3" style="background: #ccad67;position: absolute;width: 90%;margin-left: 5%;box-shadow: 0px 3px 7px 0px rgba(0,0,0,0.5);margin-top: -2em; border-radius: 5px;">
            <h4 class="h4-responsive text-center">Leave a message</h4>
          </div>
          <!-- Form contact -->
          <form class="p-5 grey-text" method="post" action="email.php">
            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
              <input type="text" id="form3" class="form-control form-control-sm" name="name">
              <label for="form3">Your name</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
              <input type="text" id="form2" class="form-control form-control-sm" name="email">
              <label for="form2">Your email</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
              <input type="text" id="form32" class="form-control form-control-sm" name="subject">
              <label for="form34">Subject</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
              <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" rows="4" name="message"></textarea>
              <label for="form8">Your message</label>
            </div>
            <div class="text-center mt-4">
              <button class="btn" type="submit" name="submit" style="background: #826931">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
          </form>
          <!-- Form contact -->
        </div>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-7 col-md-12">

        <!--Google map-->
        <!--Grid row-->
        <div class="row text-center">

          <!--Grid column-->
          <div class="col-lg-4 col-md-12 mb-3">

            <p><i class="fa fa-map fa-1x mr-2 grey-text"></i>Adarsh Nagar, Mumbai-400102</p>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-3">

            <p><i class="fa fa-building fa-1x mr-2 grey-text"></i>Mon - Sat, 11:00-18:00</p>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-3">

            <p><i class="fa fa-phone fa-1x mr-2 grey-text"></i>+ 91 9619531115</p>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->
        <div id="map-container" class="z-depth-1-half map-container mb-5" style="height: 400px"></div>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </section>

</section>
<!--Section: Contact-->