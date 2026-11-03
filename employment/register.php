<?php include "header.php";?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Register</h2>
            <div class="auto-form-wrapper">
              <form action="save_applicants.php" method="POST">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="zan_id" placeholder="Zanzibar ID" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile No" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" name="password1" placeholder="Password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" name="password2" placeholder="Re-Enter Password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
                  <a href="index.php" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
</body>

</html>