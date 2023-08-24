<?php 
include "head.inc.php";
?>
 <div class="height-100v d-flex align-items-center justify-content-center">
	<div class="card card-authentication1 mb-0">
		<div class="card-body">
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase pb-2">Reset Password</div>
		    <p class="pb-2">Please enter your email address. You will receive a link to create a new password via email.</p>
		    <form>
			  <div class="form-group">
			    <label for="email" class="">Email Address</label>
          <div class="position-relative has-icon-right">
            <input type="text" id="email" class="form-control input-shadow" placeholder="Email Address">
            <div class="form-control-position">
              <i class="icon-envelope-open"></i>
            </div>
            <span id="email_error" class="error"></span>
          </div>
			  </div>
			 
			  <button type="button" id="send_btn" onclick="email_sent_otp()" class="btn btn-light btn-block mt-3 ">Send OTP</button>

			  <div class="form-group email_verify_otp ">
			    <label for="email" class="">OTP</label>
          <div class="position-relative has-icon-right">
            <input type="text" id="email_otp" class="form-control input-shadow" placeholder="6-digit OTP"maxlength=6>
            <div class="form-control-position">
              <i class="icon-envelope-open"></i>
            </div>
            <span id="otp_error" class="error"></span>
          </div>
			  </div>
        
			  <button type="button" id="verify_btn" onclick="email_verify_otp()" class="email_verify_otp btn btn-light btn-block mt-3 ">Verify OTP</button>
        <span id="email_otp_result" class="success"></span>



			  <div class="form-group new_password ">
			    <label for="email" class="">New Password</label>
          <div class="position-relative has-icon-right">
            <input type="text" id="password" class="form-control input-shadow" placeholder="New Password" required>
            <div class="form-control-position">
              <i class="icon-envelope-open"></i>
            </div>
            <span id="password_error" class="error"></span>
          </div>
			  </div>
        
			  <button type="button" id="password_btn" onclick="password_change()" class="new_password btn btn-light btn-block mt-3 ">Change Password</button>
        <span id="password_result" class="success"></span>


      </form>
		   </div>
		  </div>
		   <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Return to the <a href="login.php"> Sign In</a></p>
		  </div>
	     </div>
	     </div>
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <script>
    function email_sent_otp(){
    jQuery('#email_error').html("");
    var email = jQuery('#email').val();
    if (email==''){
        jQuery('#email_error').html("Please enter Email");
    }
    else{
        jQuery('#send_btn').html("Wait...");
        jQuery('#send_btn').attr('disabled',true);
        jQuery.ajax({
            url:'otp.php',
            type:'post',
            data:'email='+email+'&type=forgot',
            success:function(result){
                if(result=='done'){
                    jQuery('#email').attr('disabled',true);
                    jQuery('.email_verify_otp').show();
                    jQuery('#send_btn').hide();
                }
                else if(result=="not_found"){
                    jQuery('#email_error').html('Email Id Not Found. ')
                    jQuery('#send_btn').attr('disabled',false);
                    jQuery('#send_btn').html("Send OTP");
                }
                else{
                    jQuery('#email').attr('disabled',false);
                    jQuery('#email_error').html("Try again Later");
                }
            }
        });

    }
}
function email_verify_otp(){
    jQuery('#email_error').html("");
    var otp = jQuery('#email_otp').val();
    if (otp==''){
        jQuery('#email_error').html("Please enter OTP");
    }
    else{
        jQuery('#verify_btn').html("Wait...");
        jQuery('#verify_btn').attr('disabled',true);
        jQuery.ajax({
        url:'otp.php',
        type:'post',
        data:'otp='+otp+'&type=otp_verify',
        success:function(result){
                if(result=='done'){
                    jQuery('.email_verify_otp').hide();
                    jQuery('#email_otp_result').html("Email Verified");
                    jQuery('.new_password').show();
                }
                else{
                    jQuery('#otp_error').html("Invalid OTP!");
                }
            }
        });
    }
}
function password_change(){
    jQuery('#password_error').html("");
    var password = jQuery('#password').val();
    var email = jQuery('#email').val();
    if (password==''){
        jQuery('#password_error').html("Please enter password");
    }
    else{
        jQuery('#password_btn').html("Wait...");
        jQuery('#password_btn').attr('disabled',true);
        jQuery.ajax({
        url:'users_code.php',
        type:'post',
        data:'password='+password+'&email='+email+'&type=change_password',
        success:function(result){
                if(result=='done'){
                  jQuery('#password_result').html("Password Changed successfully");
                  jQuery('#password_btn').hide();
                }
                else{
                    jQuery('#password_error').html("Try again later");
                }
            }
        });
    }
}
  </script>
	
</body>
</html>
