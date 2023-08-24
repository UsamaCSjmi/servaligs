<?php 
include "head.inc.php";
?>
<div class="card card-authentication1 mx-auto my-5">
  <div class="card-body">
    <div class="card-content p-2">
		 	<div class="text-center logo">
		 		<img src="assets/images/logo-icon.png" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
      <form>
        <div class="form-group">
          <div class="position-relative has-icon-right">
            <input type="text" id="email" class="form-control input-shadow" placeholder="Enter Email ID">
            <div class="form-control-position">
              <i class="icon-envelope"></i>
            </div>
            <span id="email_error" class="error"></span>
          </div>
        </div>
        <div class="form-group">
          <div class="position-relative has-icon-right">
            <input type="password" id="password" class="form-control input-shadow" placeholder="Enter Password">
            <div class="form-control-position">
              <i class="icon-lock"></i>
            </div>
            <span id="password_error" class="error"></span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-6">
            <div class="icheck-material-white">
            </div>
          </div>
          <div class="form-group col-6 text-right">
            <a href="reset-password.php">Forgot Password</a>
          </div>
        </div>
        <button type="button" id="submit_btn" onclick="user_login()" class="btn btn-light btn-block">Sign In</button>
        <span id="login_success" class="success"></span>		
        <span id="login_error" class="error"></span>
      </form>
    </div>
  </div>
  <div class="card-footer text-center py-3">
    <p class="text-warning mb-0">Do not have an account? <a href="register.php"> Sign Up here</a></p>
  </div>
</div>
      
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
	

	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script>
  
</body>
</html>
