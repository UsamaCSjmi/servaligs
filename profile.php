<?php 
session_start();
if(!isset($_SESSION['USER_LOGIN'])||$_SESSION['USER_LOGIN']!='1'){
  header('location:login.php');
  die();
}
include "head.inc.php";
include "nav.inc.php";
$sql="select * from users where id=$uid";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);
?>


<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-lg-6">
          <div class="tab-pane" id="edit">
            <form>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Name</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="text" value="<?php echo $row['username'];?>" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Email</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="email" value="<?php echo $row['email'];?>"disabled required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Mobile</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="text" value="<?php echo $row['mobile'];?>" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="file">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                  <div class="col-lg-9">
                      <input class="form-control" type="password" value="" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"></label>
                  <div class="col-lg-9">
                      <input type="button" class="btn btn-primary" value="Save Changes">
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