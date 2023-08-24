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
        <div class="col-lg-9">
          <div class="tab-pane" id="edit">
            <form>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Hall</label>
                  <div class="col-lg-9">
                      <input class="form-control" id="hall_id" type="hidden" value="<?php echo $hid?>" disabled required>
                      <input class="form-control" id="hall" type="text" value="<?php 
                      $sql1="select * from halls where hall_id=$hid";
                      $query1=mysqli_query($conn,$sql1);
                      $row1=mysqli_fetch_assoc($query1);
                      echo $row1['hall_name'];

                      ?>" disabled required>
                      <span id="hall_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Name</label>
                  <div class="col-lg-9">
                      <input class="form-control" id="name" type="text" required>
                      <span id="name_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Email</label>
                  <div class="col-lg-9">
                      <input class="form-control" id="email" type="email" required>
                      <span id="email_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Mobile</label>
                  <div class="col-lg-9">
                      <input class="form-control" id="mobile" type="text" required>
                      <span id="mobile_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Designation</label>
                  <div class="col-lg-9">
                    <select class="form-control" name="" id="des_id">
                      <option value="">Select</option>
                      <?php
                      $sql8="select * from designations where des_id>3";
                      $query8=mysqli_query($conn,$sql8);
                      while($row=mysqli_fetch_assoc($query8)){
                      ?>
                        <option value="<?php echo $row['des_id']?>"><?php echo $row['designation']?></option>
                        
                      <?php
                      }
                      ?>
                    </select>
                    <span id="des_id_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Password</label>
                  <div class="col-lg-9">
                      <input class="form-control" id="password" type="password" required>
                    <span id="password_error" class="error"></span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"></label>
                  <div class="col-lg-9">
                      <button type="button" id="submit_btn" onclick="add_user()" class="btn btn-light btn-block">Add</button>
                      <span id="register_success" class="success"></span>		
                      <span id="register_error" class="error"></span>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--End Row-->
      <div class="row ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Users</h5>
			        <div class="table-responsive">
               <table class="table">
                  <thead>
                  
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Email</th>
                      <th scope="col">Mobile</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select users.*,designations.* from users,designations where users.hall_id=$hid and users.des_id>3 and users.des_id=designations.des_id";
                    $query=mysqli_query($conn,$sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($query)){
                      ?>
                    <tr>
                      <th scope="row"><?php echo $i;?></th>
                      <td><?php echo $row['username'];?></td>
                      <td><?php echo $row['designation'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['mobile'];?></td>
                    </tr>
                    
                    <?php
                    $i++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->

	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
  </div><!-- End container-fluid-->  
</div><!--End content-wrapper-->
<?php
include "footer.inc.php";
?>