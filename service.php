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
              <div class="card-title">Ask for Service</div>
              <hr>
              <form>
                <div class="form-group">
                  <label for="input-6">Service Type</label>
                  <select class="form-control form-control-rounded" name="service" id="service">
                    <option>Select</option>
                    <?php
                    $sql="select * from designations";
                    $query=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($query)){
                      if(($row['des_id']!=1)&&($row['des_id']!=2)&&($row['des_id']!=3)){
                    ?>
                    <option value="<?php echo $row['des_id']?>"><?php echo $row['designation']?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                  <span id="service_type_error" class="error"></span>
                </div>
                <div class="form-group">
                  <label for="input-6">Your Issue</label>
                  <textarea class="form-control form-control-rounded" name="issue" id="issue" cols="30" rows="10" placeholder="Specify your issue"></textarea>
                  <span id="issue_error" class="error"></span>
                </div>
                <div class="form-group">
                  <button type="button" onclick="submit_issue()" class="btn btn-light btn-round px-5">
                    <i class="icon-lock"></i> Submit
                  </button>
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
<script>
 
</script>
<?php
include "footer.inc.php";
?>