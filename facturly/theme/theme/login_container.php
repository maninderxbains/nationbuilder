<!DOCTYPE html>
<html lang="en">
<head>
        <title>Facturly Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php	echo base_url("assets/css/bootstrap.min.css");	?>" />
		<link rel="stylesheet" href="<?php	echo base_url("assets/css/bootstrap-responsive.min.css");	?>" />
        <link rel="stylesheet" href="<?php	echo base_url("assets/css/matrix-login.css");	?>" />
		
        <link href="<?php	echo base_url("assets/font-awesome/css/font-awesome.css");	?>" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">       
            <form id="login_form" class="form-vertical" action="javascript:;">
				 <div class="control-group normal_text"> <h3><img src="<?php	echo base_url("assets/media/logo.png");	?>" alt="Logo" /></h3></div>
				 
                <div class="control-group">
					
                    <div class="controls">
						<p style="text-align:center;">
							<span class="help-inline" style="color:#fff;" id="oauth_error"><?php echo $oauth_error;	?></span>
						</p>
                        <div class="main_input_box">
							
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" id="login_email" placeholder="Email" name="email" />
							<span class="help-inline" style="color:#fff;" id="login_email_error"></span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" id="login_password" name="password" />
							<span class="help-inline" style="color:#fff;" id="login_password_error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-success"> Login</button></span>
                </div>
				<div class="form-actions">
					<!--<a class="btn" href="<?php/*	echo $auth_url;	*/?>">Login with Google</a>-->
					<span class="pull-left"><a href="#" class="flip-link btn" id="to-register">Register</a></span>
                    <span class="pull-right"><a href="<?php	echo $auth_url;	?>" class="btn"> Login With Google</a></span>
				</div>
            </form>
			
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
						<span class="help-inline" style="color: #fff;" id="recoverpass_error"></span>
                    </div>
                </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
				
            </form>
			
			<form id="registerform" class="form-vertical" action="javascript:;">
				 <div class="control-group normal_text"> <h3><img src="<?php	echo base_url("assets/media/logo.png");	?>" alt="Logo" /></h3></div>
				 
                <div class="control-group">
					
                    <div class="controls">
						<p style="text-align:center;">
							<span class="help-inline" style="color:#fff;" id="oauth_error1"><?php echo $oauth_error;	?></span>
						</p>
                        <div class="main_input_box">
							
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" id="register_name" placeholder="Name" name="name" />
							<span class="help-inline" style="color:#fff;" id="register_name_error"></span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-envelope"></i></span><input type="text" placeholder="Email" id="register_email" name="email" />
							<span class="help-inline" style="color:#fff;" id="register_email_error"></span>
                        </div>
                    </div>
                </div>
				<div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-lock"></i></span><input type="password" placeholder="Password" id="register_password" name="password" />
							<span class="help-inline" style="color:#fff;" id="register_password_error"></span>
                        </div>
                    </div>
                </div>
				<div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-flag"></i></span><input class="tip-top" title="Slug" type="text" placeholder="NationBuilder Slug" id="register_nation" name="nation" />
							<span class="help-inline" style="color:#fff;" id="register_nation_error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><button type="submit" class="btn btn-info">Submit</button></span>
                    <span class="pull-right"><a href="<?php	echo $auth_url;	?>" class="btn btn-success" >Sign up with google</a></span>
                </div>
				<div class="form-actions">
					<!--<a class="btn" href="<?php/*	echo $auth_url;	*/?>">Login with Google</a>-->
					<span class="pull-left"><!--<a href="#" class="flip-link btn" id="">Register</a>--></span>
                    
					<span class="pull-right"><a href="#" class="flip-link btn" id="to-login1">&laquo; Back to login</a></span>
				</div>
            </form>
			
        </div>
        
		<script src="<?php	echo base_url("assets/js/jquery.min.js");	?>"></script>  
        <script src="<?php	echo base_url("assets/js/matrix.login.js");	?>"></script>
		<script>
			/*	Check Email Syntax	*/
			function IsEmail(email) {
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
			}
			
			
	
			$("#login_form").on("submit",function() {
				$("#oauth_error").html("");
				$("#login_email_error").html("");
				$("#login_password_error").html("");
				var email = $("#login_email").val();
				var password = $("#login_password").val();
				
				if (email=="") {
					$("#login_email_error").html("Email can't be empty");
					return false;
				}
				
				if(!IsEmail(email))
				{
					$("#login_email_error").html("Enter Valid Email");
					return false;
				}
			
				if (password=="") {
					$("#login_password_error").html("Password can't be empty");
					return false;
				}
				
				var base_url = "<?php	echo base_url();	?>";
				
				var form = $(this)[0]; 
				var formData = new FormData(form);
				
				$.ajax({
					url:base_url+"login/validateUser",
					data:formData,
					type:"POST",
					processData: false,
					contentType: false,
					success:function(response)
					{
						response = JSON.parse(response);
						if (response.error=="1") {
							$("#login_password_error").html(response.message);
						}
						if (response.error=="0") {
							if (response.email_exist=="0" && response.user_authenticate=="0") {
								$("#login_password_error").html(response.message);
							} else if (response.email_exist=="1" && response.user_authenticate=="0") {
								$("#login_password_error").html(response.message);
							}  else if (response.email_exist=="1" && response.user_authenticate=="1") {
								window.location.href = base_url+"dashboard";
							}
						}
					}
				});
			});
			
			$("#registerform").on("submit",function() {
				$("#oauth_error1").html("");
				$("#register_name_error").html("");
				$("#register_email_error").html("");
				$("#register_password_error").html("");
				$("#register_nation_error").html("");
				
				var name = $("#register_name").val();
				var email = $("#register_email").val();
				var pass = $("#register_password").val();
				var nation = $("#register_nation").val();
				
				if (name=="") {
					$("#register_name_error").html("Name can't be empty");
					return false;
				}
				
				if (email=="") {
					$("#register_email_error").html("Email can't be empty");
					return false;
				}
				
				if(!IsEmail(email))
				{
					$("#register_email_error").html("Enter Valid Email");
					return false;
				}
			
				if (password=="") {
					$("#register_password_error").html("Password can't be empty");
					return false;
				}
				
				if (nation=="") {
					$("#register_nation_error").html("Email can't be empty");
					return false;
				}
				var base_url = "<?php	echo base_url();	?>";
				
				var form = $(this)[0]; 
				var formData = new FormData(form);
				
				$.ajax({
					url:base_url+"login/registerUser",
					data:formData,
					type:"POST",
					processData: false,
					contentType: false,
					success:function(response)
					{
						response = JSON.parse(response);
						if (response.error=="1") {
							$("#login_password_error").html(response.message);
						}
						if (response.error=="0") {
							if (response.email_exist=="0" && response.user_authenticate=="0") {
								$("#login_password_error").html(response.message);
							} else if (response.email_exist=="1" && response.user_authenticate=="0") {
								$("#login_password_error").html(response.message);
							}  else if (response.email_exist=="1" && response.user_authenticate=="1") {
								window.location.href = base_url+"dashboard";
							}
						}
					}
				});
			});
		</script>
    </body>
</html>
