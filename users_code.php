<?php 
session_start();
require ('connection.inc.php');
require ('functions.inc.php');
$type=get_safe_value($conn,$_POST['type']);
if($type=='register'){
    $name=get_safe_value($conn,$_POST['name']);
    $email=get_safe_value($conn,$_POST['email']);
    $mobile=get_safe_value($conn,$_POST['mobile']);
    $hall_id=get_safe_value($conn,$_POST['hall_id']);
    $des_id=get_safe_value($conn,$_POST['des_id']);
    $password=get_safe_value($conn,$_POST['password']);
    $hostel=get_safe_value($conn,$_POST['hostel']);
    $room=get_safe_value($conn,$_POST['room']);
    $eno=get_safe_value($conn,$_POST['eno']);
    $password=md5($password);
    $added_on=date('Y-m-d h:i:s');

    $check_email=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
    if($check_email>0){
        echo "email_present";
    }
    else{
        $sql="insert into users (username,email,password,hall_id,des_id,hostel,room,eno,mobile,added_on) values('$name','$email','$password','$hall_id','$des_id','$hostel','$room','$eno','$mobile','$added_on')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "insert";
        }
        else{
            echo "error";
        }
    }
}
if($type=='add_hall'){
    $name=get_safe_value($conn,$_POST['name']);
    $email=get_safe_value($conn,$_POST['email']);
    $mobile=get_safe_value($conn,$_POST['mobile']);
    $hall_name=get_safe_value($conn,$_POST['hall_name']);
    $password=get_safe_value($conn,$_POST['password']);
    $password=md5($password);
    $added_on=date('Y-m-d h:i:s');

    $check_hall=mysqli_num_rows(mysqli_query($conn,"select * from halls where hall_name=$hall_name"));
    $check_email=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
    if($check_hall>0){
        echo "hall_present";
    }
    elseif($check_email>0){
        echo "email_present";
    }
    else{
        $sql1="insert into halls (hall_name) values ('$hall_name')";
        $query1=mysqli_query($conn,$sql1);
        $hall_id=mysqli_insert_id($conn);
        $des_id=2;
        $hostel="EMPLOYEE";
        $room="EMP";
        $eno="EMPLOY";
        $sql="insert into users (username,email,password,hall_id,des_id,hostel,room,eno,mobile,added_on) values('$name','$email','$password','$hall_id','$des_id','$hostel','$room','$eno','$mobile','$added_on')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "insert";
        }
        else{
            echo "error";
        }
    }
}
elseif($type=='update_hall'){
    $h_id=get_safe_value($conn,$_POST['h_id']);
    $name=get_safe_value($conn,$_POST['name']);
    $email=get_safe_value($conn,$_POST['email']);
    $mobile=get_safe_value($conn,$_POST['mobile']);
    $hall_name=get_safe_value($conn,$_POST['hall_name']);
    $password=get_safe_value($conn,$_POST['password']);
    $password=md5($password);
    $added_on=date('Y-m-d h:i:s');

    $check_hall=mysqli_num_rows(mysqli_query($conn,"select * from halls where hall_id !=$h_id and hall_name=$hall_name"));
    $check_email=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email' and hall_id!=$h_id and des_id!=2"));
    if($check_hall>0){
        echo "hall_present";
    }
    elseif($check_email>0){
        echo "email_present";
    }
    else{
        $sql1="update halls set hall_name=$hall_name where hall_id=$h_id";
        $query1=mysqli_query($conn,$sql1);
        $sql="update users set username='$name', email='$email', mobile='$mobile', password='$password' where hall_id=$h_id and des_id=2";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "insert";
        }
        else{
            echo "error";
        }
    }
}
elseif($type=='change_password'){
    $password=get_safe_value($conn,$_POST['password']);
    $email=get_safe_value($conn,$_POST['email']);
    $password=md5($password);


    $sql="update users set password=$password where email=$email";
    $query1=mysqli_query($conn,$sql);
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "done";
    }
    else{
        echo "error";
    }

}
elseif($type=='login'){
    $email=get_safe_value($conn,$_POST['email']);
    $password=get_safe_value($conn,$_POST['password']);
    $password=md5($password);
    $res=mysqli_query($conn,"select * from users where email='$email' and password='$password'");
    $check_user=mysqli_num_rows($res);
    if($check_user>0){
        $row=mysqli_fetch_assoc($res);
        // SESSION STARTS 
        session_start();
        $_SESSION['USER_LOGIN']='1';
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['USER_HALL_ID']=$row['hall_id'];
        $_SESSION['USER_DES_ID']=$row['des_id'];
        echo "valid";
    }
    else{
        echo "wrong";
    }
}
elseif($type=='logout'){
    session_start();
    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER_ID']);
    session_unset();
    session_destroy();
    echo 'success';
}
elseif($type=='issue'){
    $des_id=get_safe_value($conn,$_POST['service']);
    $issue=get_safe_value($conn,$_POST['issue']);
    $date=date('Y-m-d');
    $hall_id=$_SESSION['USER_HALL_ID'];
    $sql="select * from users where hall_id = $hall_id and des_id=$des_id order by id asc";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);
    $to_id=$row['id'];
    $from_id=$_SESSION['USER_ID'];
    $sql2="insert into issues (issue,date,from_id,to_id) values('$issue','$date','$from_id','$to_id')";
    $query2=mysqli_query($conn,$sql2);
    if($query2){
        echo 'success';
    }
    else{
        echo 'failed';
    }
}
elseif($type=='complaint'){
    $is_id=get_safe_value($conn,$_POST['is_id']);
    $complaint=get_safe_value($conn,$_POST['complaint']);
    $date=date('Y-m-d');
    $sql2="insert into complaints (is_id,complaint,date) values('$is_id','$complaint','$date')";
    $query2=mysqli_query($conn,$sql2);
    if($query2){
        echo 'success';
    }
    else{
        echo 'failed';
    }
}
?>