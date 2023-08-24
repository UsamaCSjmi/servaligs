<?php 
session_start();
if(!isset($_SESSION['USER_LOGIN'])||$_SESSION['USER_LOGIN']!='1'){
  header('location:login.php');
  die();
}
$hall_name="";
$name="";
$email="";
$mobile="";
if((isset($_GET['type']))&&($_GET['type']=="update_hall")){
  require ('connection.inc.php');
  require ('functions.inc.php');
  $h_id=get_safe_value($conn,$_GET['h_id']);
  $sql="select halls.*,users.* from halls,users where halls.hall_id=$h_id and users.des_id=2 and users.hall_id=$h_id";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($query);
  $hall_name=$row['hall_name'];
  $name=$row['username'];
  $email=$row['email'];
  $mobile=$row['mobile']; 
}

include "head.inc.php";
include "nav.inc.php";
?>


<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-lg-9">
          <div class="tab-pane" id="edit">
            <form>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Hall Name</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="text" id="hall_name" placeholder="Hall Name" value="<?php echo $hall_name?>" required>
                      <span id="h_name_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Provost Name</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="text" id="name" placeholder="Provost Name" value="<?php echo $name?>" required>
                      <span id="name_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Provost Email</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="email" id="email" placeholder="Email" value="<?php echo $email?>" required>
                      <span id="email_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Provost Mobile</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="text" id="mobile" placeholder="Mobile" value="<?php echo $mobile?>" maxlength=10 required>
                      <span id="mobile_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Provost Password</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="password" placeholder="Password" id="password" required>
                      <span id="password_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"></label>
                  <div class="col-lg-9">
                    <?php 
                    if((isset($_GET['type']))&&($_GET['type']=="update_hall")){
                    ?>
                      <input type="hidden" id="h_id" value=<?php echo $h_id?>>
                      <input type="button" onclick="update_hall()"class="btn btn-light btn-block waves-effect waves-light" value="Update Info">	
                    <?php
                    }
                    else{
                    ?>
                    <input type="button" onclick="add_hall()"class="btn btn-light btn-block waves-effect waves-light" value="ADD HALL">	
                    <?php
                    }
                    ?>
                      <span id="register_success" class="success"></span>		
                      <span id="register_error" class="error"></span>	
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--End Row-->
     

	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
  </div><!-- End container-fluid-->  
</div><!--End content-wrapper-->
<?php
include "footer.inc.php";
?>