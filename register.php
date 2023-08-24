<?php 
include "head.inc.php";
require "connection.inc.php";
?>
<div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="assets/images/logo-icon.png" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign Up</div>
		    <form>
        <div class="form-group">
			    <label for="hall" class="sr-only">Enrolment No.</label>
			    <div class="position-relative has-icon-right">
				    <input type="text" name="eno" id="eno" class="form-control input-shadow" placeholder="Enrolment No." required maxlength=6/>
            <div class="form-control-position">
              <i class="icon-home"></i>
            </div>
            <span id="eno_error" class="error"></span>
			    </div>
			  </div>
			  <div class="form-group">
			  <label for="name" class="sr-only">Name</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="name" class="form-control input-shadow" placeholder="Enter Your Name" required>
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
          <span id="name_error" class="error"></span>
			   </div>
			  </div>
				<div class="form-group">
					<label for="email" class="sr-only">Email ID</label>
					<div class="position-relative has-icon-right">
						<input type="email" id="email" class="form-control input-shadow" placeholder="Enter Your Email ID" required>
						<div class="form-control-position">
						<i class="icon-envelope-open"></i>
						</div>
						<span id="email_error" class="error"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="mobile" class="sr-only">Mobile</label>
					<div class="position-relative has-icon-right">
						<input type="text" id="mobile" class="form-control input-shadow" placeholder="Enter Your mobile" required>
						<div class="form-control-position">
						<i class="icon-call"></i>
						</div>
						<span id="mobile_error" class="error"></span>
					</div>
				</div>
        <div class="form-group">
			    <label for="hall" class="sr-only">Hall Of Residence</label>
			    <div class="position-relative has-icon-right">
				    <select name="hall_id" id="hall_id" class="form-control input-shadow">
              <option selected>Hall of Residence</option>
              <?php
              $sql="select * from halls";
              $result=mysqli_query($conn,$sql);
              while($halls=mysqli_fetch_assoc($result)){
                echo "<option value='".$halls['hall_id']."'>".$halls['hall_name']."</option>";
              }
              ?>
            </select>
            <div class="form-control-position">
              <i class="icon-home"></i>
            </div>
            <span id="hall_error" class="error"></span>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="hall" class="sr-only">Hostel</label>
			    <div class="position-relative has-icon-right">
				    <input type="text" name="hostel" id="hostel" class="form-control input-shadow" placeholder="Hostel" required maxlength=30/>
            <div class="form-control-position">
              <i class="icon-home"></i>
            </div>
            <span id="hostel_error" class="error"></span>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="hall" class="sr-only">Room No.</label>
			    <div class="position-relative has-icon-right">
				    <input type="text" name="room" id="room" class="form-control input-shadow" placeholder="Room No." required maxlength=3/>
            <div class="form-control-position">
              <i class="icon-home"></i>
            </div>
            <span id="room_error" class="error"></span>
			    </div>
			  </div>
			  <div class="form-group">
			   <label for="password" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="password" class="form-control input-shadow" placeholder="Choose Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
          <span id="password_error" class="error"></span>
			   </div>
			  </div>			  
        <button type="button" id="submit_btn" onclick="user_register()" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>	
        <span id="register_success" class="success"></span>		
        <span id="register_error" class="error"></span>		
			 </form>
		  </div>
		</div>
    <div class="card-footer text-center py-3">
      <p class="text-warning mb-0">Already have an account? <a href="login.php"> Sign In here</a></p>
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
  
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script>
  
</body>
</html>
