<?php 
session_start();
if(!isset($_SESSION['USER_LOGIN'])||$_SESSION['USER_LOGIN']!='1'){
  header('location:login.php');
  die();
}
include "head.inc.php";
include "nav.inc.php";
?>


<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="card-title">File a Complaint</div>
              <hr>
              <form>
                <div class="form-group">
                  <label for="input-6">Issue ID</label>
                  <select class="form-control form-control-rounded" name="is_id" id="is_id">
                    <option>Select</option>
                    <?php
                    $sql="select issues.*,users.id from issues,users where users.id=$uid and issues.from_id=$uid";
                    $query=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($query)){
                    ?>
                    <option value="<?php echo $row['is_id']?>"><?php echo $row['is_id']?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="input-6">Your Complaint</label>
                  <textarea class="form-control form-control-rounded" name="complaint" id="complaint" cols="30" rows="10" placeholder="Specify your complaint"></textarea>
                  <span id="complaint_error" class="error"></span>
                </div>
                <div class="form-group">
                  <button type="button" onclick="register_complaint()" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Submit</button>
                </div>
                <span id="submit_success" class="success"></span>		
                <span id="submit_error" class="error"></span>
              </form>
            </div>
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