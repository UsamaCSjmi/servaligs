  <?php
  $uid=$_SESSION['USER_ID'];
  $hid=$_SESSION['USER_HALL_ID'];
  $sql="select designations.*,users.id,users.img,users.username,users.des_id from users,designations where users.id=$uid and users.des_id=designations.des_id";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($query);
  ?>

  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">ServAligs</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php
        if($row['des_id']==1){
          ?>
        <li>
          <a href="service.php">
          <i class="zmdi zmdi-odnoklassniki text-success"></i><span>Need Service</span>
          </a>
        </li>
        <li>
          <a href="complaint.php">
          <i class="zmdi zmdi-chart-donut text-danger"></i><span>Complaints</span>
          </a>
        </li>
        <?php
        }
        ?>
        <?php
        if($row['des_id']==3){
          ?>
        <li>
          <a href="hall.php">
          <i class="zmdi zmdi-odnoklassniki text-success"></i><span>Add Hall</span>
          </a>
        </li>
        <?php
        }
        ?>
        <?php
        if($row['des_id']==2){
          ?>
        <li>
          <a href="add_user.php">
          <i class="zmdi zmdi-odnoklassniki text-success"></i><span>Users</span>
          </a>
        </li>
        <?php
        }
        ?>
        <li>
          <a href="profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
          </a>
        </li>
      </li>
    </ul>
  </div>
   <!--End sidebar-wrapper-->
   
<!--Start topbar header-->
<header class="topbar-nav">
  <nav class="navbar navbar-expand fixed-top">
    <ul class="navbar-nav mr-auto align-items-center">
      <li class="nav-item">
        <a class="nav-link toggle-menu" href="javascript:void();">
        <i class="icon-menu menu-icon"></i>
      </a>
      </li>
    </ul>
      
    <ul class="navbar-nav align-items-center right-nav-link">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <span class="user-profile"><?php echo $row['designation']?> | <?php echo $row['username']?></span>
          <span class="user-profile"><img src="users_img/<?php echo $row['img']?>" class="img-circle" alt="user avatar"></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:;" onclick='user_logout()'>
          <span class="">
            <i class="icon-power mr-2"></i> 
          </span>
        </a>
      </li>
    </ul>
  </nav>
</header>
<!--End topbar header-->
