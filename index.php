<?php 

session_start();
if(!isset($_SESSION['USER_LOGIN'])||$_SESSION['USER_LOGIN']!='1'){
  header('location:login.php');
  die();
}
if((isset($_GET['type']))&&($_GET['type']=="change")){
  require ('connection.inc.php');
  require ('functions.inc.php');
  $is_id=get_safe_value($conn,$_GET['is_id']);
  $method=get_safe_value($conn,$_GET['method']);
  $sql8="update issues set status = '$method' where issues.is_id=$is_id";
  $query8=mysqli_query($conn,$sql8);
  if($query8){
    header("location:index.php");
  }
  else{
    echo "ERROR";
    die();
  }
}
if((isset($_GET['type']))&&($_GET['type']=="change_comp")){
  require ('connection.inc.php');
  require ('functions.inc.php');
  $c_id=get_safe_value($conn,$_GET['c_id']);
  $method=get_safe_value($conn,$_GET['method']);
  $sql8="update complaints set status = '$method' where complaints.c_id=$c_id";
  $query8=mysqli_query($conn,$sql8);
  if($query8){
    header("location:index.php");
  }
  else{
    echo "ERROR";
    die();
  }
}
include "head.inc.php";
include "nav.inc.php";
?>


<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

  <!-- Students section start -->

    <?php
    if($row['des_id']==1){
    ?>
      <div class="row ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Issues</h5>
              <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Issue ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Issue Type</th>
                      <th scope="col">Service Provider</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Issue</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select * from issues where from_id = $uid";
                    $query=mysqli_query($conn,$sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($query)){
                      $emp_id=$row['to_id'];
                      $sql2="select users.username,users.mobile,designations.designation from users,designations where users.id = $emp_id and designations.des_id=users.des_id";
                      $query2=mysqli_query($conn,$sql2);
                      $row2=mysqli_fetch_assoc($query2);
                      ?>
                    <tr>
                      <th scope="row"><?php echo $i;?></th>
                      <td><?php echo $row['is_id'];?></td>
                      <td><?php echo $row['date'];?></td>
                      <td><?php echo $row2['designation'];?></td>
                      <td><?php echo $row2['username'];?></td>
                      <td><?php echo $row2['mobile'];?></td>
                      <td><?php echo $row['issue'];?></td>
                      <td>
                        <span class="btn btn-<?php
                        if($row['status']=="pending"){
                          echo "warning";
                        }
                        elseif($row['status']=="rejected"){
                          echo "danger";
                        }
                        elseif($row['status']=="success"){
                          echo "success";
                        }
                        ?> btn-round"><?php echo $row['status'];?></span>
                      </td>
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
  
      <div class="row ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Complaints</h5>
			        <div class="table-responsive">
               <table class="table">
                  <thead>
                  
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Complaint ID</th>
                      <th scope="col">Issue ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select issues.is_id,issues.to_id,complaints.* from issues,complaints where issues.from_id = $uid and complaints.is_id=issues.is_id";
                    $query=mysqli_query($conn,$sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($query)){
                      ?>
                    <tr>
                      <th scope="row"><?php echo $i;?></th>
                      <td><?php echo $row['c_id'];?></td>
                      <td><?php echo $row['is_id'];?></td>
                      <td><?php echo $row['date'];?></td>
                      <td>
                        <span class="btn btn-<?php
                        if($row['status']=="pending"){
                          echo "warning";
                        }
                        elseif($row['status']=="rejected"){
                          echo "danger";
                        }
                        elseif($row['status']=="success"){
                          echo "success";
                        }
                        ?> btn-round"><?php echo $row['status'];?></span>
                      </td>
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

    <?php
    }
    ?>
  <!-- Students section end -->




  <!-- Provost section Start -->


    <?php
    if($row['des_id']==2){
    ?>


      <div class="row ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Complaints</h5>
			        <div class="table-responsive">
               <table class="table">
                  <thead>
                  
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Complaint ID</th>
                      <th scope="col">Issue ID</th>
                      <th scope="col">From</th>
                      <th scope="col">Complaint</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Change Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select complaints.*,issues.*,complaints.status as comp_st, users.* from complaints,issues,users where complaints.is_id=issues.is_id and issues.from_id=users.id and users.hall_id=$hid order by complaints.c_id desc";
                    $query=mysqli_query($conn,$sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($query)){
                      ?>
                    <tr>
                      <th scope="row"><?php echo $i;?></th>
                      <td><?php echo $row['c_id'];?></td>
                      <td><?php echo $row['is_id'];?></td>
                      <td><?php echo $row['username'];?></td>
                      <td><?php echo $row['complaint'];?></td>
                      <td><?php echo $row['date'];?></td>
                      <td>
                        <span class="btn btn-<?php
                        if($row['comp_st']=="pending"){
                          echo "warning";
                        }
                        elseif($row['comp_st']=="rejected"){
                          echo "danger";
                        }
                        elseif($row['comp_st']=="success"){
                          echo "success";
                        }
                        ?> btn-round"><?php echo $row['comp_st'];?></span>
                      </td>
                      <td><a class="btn btn-danger btn-round" href="index.php?type=change_comp&c_id=<?php echo $row['c_id'];?>&method=rejected">Reject</a>&nbsp;<a class="btn btn-success btn-round" href="index.php?type=change_comp&c_id=<?php echo $row['c_id'];?>&method=success">Success</a></td>
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

      
      <div class="row ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Issues</h5>
              <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Issue ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Issue Type</th>
                      <th scope="col">Issue From</th>
                      <th scope="col">Service Provider</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Issue</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select issues.*,users.* from issues,users where users.hall_id=$hid and issues.from_id = users.id order by issues.is_id desc";
                    $query=mysqli_query($conn,$sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($query)){
                      $emp_id=$row['to_id'];
                      $sql2="select users.username,users.mobile,designations.designation from users,designations where users.id = $emp_id and designations.des_id=users.des_id";
                      $query2=mysqli_query($conn,$sql2);
                      $row2=mysqli_fetch_assoc($query2);
                      ?>
                    <tr>
                      <th scope="row"><?php echo $i;?></th>
                      <td><?php echo $row['is_id'];?></td>
                      <td><?php echo $row['date'];?></td>
                      <td><?php echo $row2['designation'];?></td>
                      <td><?php echo $row2['from'];?></td>
                      <td><?php echo $row2['username'];?></td>
                      <td><?php echo $row2['mobile'];?></td>
                      <td><?php echo $row['issue'];?></td>
                      <td>
                        <span class="btn btn-<?php
                        if($row['status']=="pending"){
                          echo "warning";
                        }
                        elseif($row['status']=="rejected"){
                          echo "danger";
                        }
                        elseif($row['status']=="success"){
                          echo "success";
                        }
                        ?> btn-round"><?php echo $row['status'];?></span>
                      </td>
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

    <?php
    }
    ?>
 <!-- Provost section End -->
      

  <!-- ADMIN section Start -->


    <?php
    if($row['des_id']==3){
    ?>
      <div class="row ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Halls</h5>
			        <div class="table-responsive">
               <table class="table">
                  <thead>
                  
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Hall ID</th>
                      <th scope="col">Hall Name</th>
                      <th scope="col">Provost</th>
                      <th scope="col">Email</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select halls.*,users.* from halls, users where users.des_id=2 and users.hall_id=halls.hall_id";
                    $query=mysqli_query($conn,$sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($query)){
                      ?>
                    <tr>
                      <th scope="row"><?php echo $i;?></th>
                      <td><?php echo $row['hall_id'];?></td>
                      <td><?php echo $row['hall_name'];?></td>
                      <td><?php echo $row['username'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['mobile'];?></td>
                      <td><a class="btn btn-light btn-block waves-effect waves-light" href="hall.php?type=update_hall&h_id=<?php echo $row['hall_id'];?>">Edit</a></td>
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

    <?php
    }
    ?>
 <!-- ADMIN section End -->
      

  <!-- Employee section Start -->


    <?php
    if($row['des_id']>3){
    ?>
       <div class="row ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Issues</h5>
              <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Issue ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Student</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Hostel</th>
                      <th scope="col">Room No.</th>
                      <th scope="col">Issue</th>
                      <th scope="col">Status</th>
                      <th scope="col">Change Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select * from issues where to_id = $uid";
                    $query=mysqli_query($conn,$sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($query)){
                      $student_id=$row['from_id'];
                      $sql2="select * from users where users.id = $student_id";
                      $query2=mysqli_query($conn,$sql2);
                      $row2=mysqli_fetch_assoc($query2);
                      ?>
                    <tr>
                      <th scope="row"><?php echo $i;?></th>
                      <td><?php echo $row['is_id'];?></td>
                      <td><?php echo $row['date'];?></td>
                      <td><?php echo $row2['username'];?></td>
                      <td><?php echo $row2['mobile'];?></td>
                      <td><?php echo $row2['hostel'];?></td>
                      <td><?php echo $row2['room'];?></td>
                      <td><?php echo $row['issue'];?></td>
                      <td>
                        <span class="btn btn-<?php
                        if($row['status']=="pending"){
                          echo "warning";
                        }
                        elseif($row['status']=="rejected"){
                          echo "danger";
                        }
                        elseif($row['status']=="success"){
                          echo "success";
                        }
                        ?> btn-round"><?php echo $row['status'];?></span>
                      </td>
                      <td><a class="btn btn-danger btn-round" href="index.php?type=change&is_id=<?php echo $row['is_id'];?>&method=rejected">Reject</a>&nbsp;<a class="btn btn-success btn-round" href="index.php?type=change&is_id=<?php echo $row['is_id'];?>&method=success">Success</a></td>
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
  
    <?php
    }
    ?>
 <!-- Employee section End -->
      

	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

  </div><!-- End container-fluid-->
    
</div><!--End content-wrapper-->
<?php
include "footer.inc.php";
?>