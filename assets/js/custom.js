
function user_register(){
    jQuery('.error').html('');
    jQuery('.success').html('');
    var name=jQuery("#name").val();
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var hall=jQuery("#hall_id").val();
    var password=jQuery("#password").val();
    var hostel=jQuery("#hostel").val();
    var room=jQuery("#room").val();
    var eno=jQuery("#eno").val();
    var is_error='';
    if(hostel==""){
        jQuery('#hostel_error').html("Please enter Hostel");
        is_error='yes';
    }
    if(room==""){
        jQuery('#room_error').html("Please enter Room No.");
        is_error='yes';
    }
    if(eno==""){
        jQuery('#eno_error').html("Please enter Enrolment No.");
        is_error='yes';
    }
    if(name==""){
        jQuery('#name_error').html("Please enter name");
        is_error='yes';
    }
    if(email==""){
        jQuery('#email_error').html("Please enter email");
        is_error='yes';
    }
    if(mobile==""){
        jQuery('#mobile_error').html("Please enter mobile");
        is_error='yes';
    }
    if(hall==""){
        jQuery('#hall_error').html("Please select Hall of Residence");
        is_error='yes';
    }
    if(password==""){
        jQuery('#password_error').html("Please enter password");
        is_error='yes';
    }
   
    if(is_error==''){
        jQuery('#submit_btn').attr('disabled',true);
        jQuery('#submit_btn').html("Wait...");
        jQuery.ajax({
            url:'users_code.php',
            type:'post',
            data:'eno='+eno+'&room='+room+'&hostel='+hostel+'&name='+name+'&email='+email+'&hall_id='+hall+'&des_id=1&password='+password+'&mobile='+mobile+'&type=register',
            success:function(result){
                if(result=="email_present"){
                    jQuery('#email_error').html('Email Id already exists')
                }
                if(result=="insert"){
                    jQuery('#register_success').html('Successfully registered. Please login to continue.')
                }
                if(result=="error"){
                    jQuery('#register_error').html('Unable to register. Try again.')
                }
                jQuery('#submit_btn').attr('disabled',false);
                jQuery('#submit_btn').html("SIGN UP");
            }
        });
    }
}


function user_login(){
    jQuery('.error').html('');
    jQuery('.success').html('');
    var email=jQuery("#email").val();
    var password=jQuery("#password").val();
    var is_error='';
    if(email==""){
        jQuery('#email_error').html("Please enter email");
        is_error='yes';
    }
    if(password==""){
        jQuery('#password_error').html("Please enter password");
        is_error='yes';
    }
    if(is_error==''){
        jQuery('#submit_btn').attr('disabled',true);
        jQuery('#submit_btn').html("Wait...");
        jQuery.ajax({
            url:'users_code.php',
            type:'post',
            data:'email='+email+'&password='+password+'&type=login',
            success:function(result){
                if(result=="wrong"){
                    jQuery('#login_error').html('Invalid credentials!');
                    jQuery('#submit_btn').attr('disabled',false);
                    jQuery('#submit_btn').html("SIGN IN");
                }
                if(result=="valid"){
                    jQuery('#login_success').html('Successfully Logged in');
                    window.location.href="index.php";
                }
            }
        });
    }
}
 
function submit_issue(){
    jQuery('.error').html('');
    jQuery('.success').html('');
    var service=jQuery("#service").val();
    var issue=jQuery("#issue").val();
    var is_error='';
    if(issue==""){
        jQuery('#issue_error').html("Please specify your issue");
        is_error='yes';
    }
    if(service==""){
        jQuery('#service_type_error').html("Please select service type");
        is_error='yes';
    }
    if(is_error==''){
        jQuery('#submit_btn').attr('disabled',true);
        jQuery('#submit_btn').html("Wait...");
        jQuery.ajax({
            url:'users_code.php',
            type:'post',
            data:'service='+service+'&issue='+issue+'&type=issue',
            success:function(result){
                if(result=="success"){
                    jQuery('#submit_success').html('Your request submitted successfully');
                }
                else if(result=="failed"){
                    jQuery('#submit_error').html('Unable to process your request ');
                }
                else{
                    jQuery('#submit_error').html('Error');
                }
            }
        });
    }
}

function user_logout(){
    jQuery.ajax({
        url:'users_code.php',
        type:'post',
        data:'type=logout',
        success:function(result){
            if(result=="success"){
                window.location.href="login.php";
            }
        }
    });
}

function register_complaint(){
    jQuery('.error').html('');
    jQuery('.success').html('');
    var is_id=jQuery("#is_id").val();
    var complaint=jQuery("#complaint").val();
    var is_error='';
    if(complaint==""){
        jQuery('#complaint_error').html("Please specify your Complaint");
        is_error='yes';
    }
    if(is_error==''){
        jQuery('#submit_btn').attr('disabled',true);
        jQuery('#submit_btn').html("Wait...");
        jQuery.ajax({
            url:'users_code.php',
            type:'post',
            data:'is_id='+is_id+'&complaint='+complaint+'&type=complaint',
            success:function(result){
                if(result=="success"){
                    jQuery('#submit_success').html('Your request submitted successfully');
                }
                else if(result=="failed"){
                    jQuery('#submit_error').html('Unable to process your request ');
                }
                else{
                    jQuery('#submit_error').html('Error');
                }
            }
        });
    }
}
function add_user(){
    jQuery('.error').html('');
    jQuery('.success').html('');
    var name=jQuery("#name").val();
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var hall=jQuery("#hall_id").val();
    var des_id=jQuery("#des_id").val();
    var password=jQuery("#password").val();
    var is_error='';
    if(name==""){
        jQuery('#name_error').html("Please enter name");
        is_error='yes';
    }
    if(email==""){
        jQuery('#email_error').html("Please enter email");
        is_error='yes';
    }
    if(hall==""){
        jQuery('#hall_error').html("Please select Hall of Residence");
        is_error='yes';
    }
    if(mobile==""){
        jQuery('#mobile_error').html("Please enter mobile");
        is_error='yes';
    }
    if(password==""){
        jQuery('#password_error').html("Please enter password");
        is_error='yes';
    }
    if(des_id==""){
        jQuery('#des_id_error').html("Please Select Designation");
        is_error='yes';
    }
   
    if(is_error==''){
        jQuery('#submit_btn').attr('disabled',true);
        jQuery('#submit_btn').html("Wait...");
        jQuery.ajax({
            url:'users_code.php',
            type:'post',
            data:'eno=EMPLOY&room=EMP&hostel=EMPLOYEE&name='+name+'&email='+email+'&hall_id='+hall+'&des_id='+des_id+'&password='+password+'&mobile='+mobile+'&type=register',
            success:function(result){
                if(result=="email_present"){
                    jQuery('#email_error').html('Email Id already exists')
                }
                if(result=="insert"){
                    jQuery('#register_success').html('Successfully registered. Please refresh to view changes')
                }
                if(result=="error"){
                    jQuery('#register_error').html('Unable to register. Try again.')
                }
                jQuery('#submit_btn').attr('disabled',false);
                jQuery('#submit_btn').html("ADD");
            }
        });
    }
}
function add_hall(){
    jQuery('.error').html('');
    jQuery('.success').html('');
    var name=jQuery("#name").val();
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var hall_name=jQuery("#hall_name").val();
    var password=jQuery("#password").val();
    var is_error='';
    if(name==""){
        jQuery('#name_error').html("Please enter name");
        is_error='yes';
    }
    if(email==""){
        jQuery('#email_error').html("Please enter email");
        is_error='yes';
    }
    if(hall_name==""){
        jQuery('#h_name_error').html("Please Enter hall name");
        is_error='yes';
    }
    if(mobile==""){
        jQuery('#mobile_error').html("Please enter mobile");
        is_error='yes';
    }
    if(password==""){
        jQuery('#password_error').html("Please enter password");
        is_error='yes';
    }
   
    if(is_error==''){
        jQuery('#submit_btn').attr('disabled',true);
        jQuery('#submit_btn').html("Wait...");
        jQuery.ajax({
            url:'users_code.php',
            type:'post',
            data:'&type=add_hall&hall_name='+hall_name+'&mobile='+mobile+'&name='+name+'&email='+email+'&password='+password,
            success:function(result){
                if(result=="email_present"){
                    jQuery('#email_error').html('Email Id already exists')
                }
                if(result=="hall_present"){
                    jQuery('#h_name_error').html('Hall already exists')
                }
                if(result=="insert"){
                    jQuery('#register_success').html('Successfully Added.')
                }
                if(result=="error"){
                    jQuery('#register_error').html('Unable to Add.')
                }
                jQuery('#submit_btn').attr('disabled',false);
                jQuery('#submit_btn').html("ADD HALL");
            }
        });
    }
}
function update_hall(){
    jQuery('.error').html('');
    jQuery('.success').html('');
    var h_id=jQuery("#h_id").val();
    var name=jQuery("#name").val();
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var hall_name=jQuery("#hall_name").val();
    var password=jQuery("#password").val();
    var is_error='';
    if(name==""){
        jQuery('#name_error').html("Please enter name");
        is_error='yes';
    }
    if(email==""){
        jQuery('#email_error').html("Please enter email");
        is_error='yes';
    }
    if(hall_name==""){
        jQuery('#h_name_error').html("Please Enter hall name");
        is_error='yes';
    }
    if(mobile==""){
        jQuery('#mobile_error').html("Please enter mobile");
        is_error='yes';
    }
    if(password==""){
        jQuery('#password_error').html("Please enter password");
        is_error='yes';
    }
   
    if(is_error==''){
        jQuery('#submit_btn').attr('disabled',true);
        jQuery('#submit_btn').html("Wait...");
        jQuery.ajax({
            url:'users_code.php',
            type:'post',
            data:'&type=update_hall&h_id='+h_id+'&hall_name='+hall_name+'&mobile='+mobile+'&name='+name+'&email='+email+'&password='+password,
            success:function(result){
                if(result=="email_present"){
                    jQuery('#email_error').html('Email Id already exists')
                }
                if(result=="hall_present"){
                    jQuery('#h_name_error').html('Hall already exists')
                }
                if(result=="insert"){
                    jQuery('#register_success').html('Successfully UPDATED.')
                }
                if(result=="error"){
                    jQuery('#register_error').html('Unable to UPDATE.')
                }
                jQuery('#submit_btn').attr('disabled',false);
                jQuery('#submit_btn').html("UPDATE INFO");
            }
        });
    }
}
