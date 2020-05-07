<?php 
$Obj_Controller = new Controller();
$Obj_Controller->Login();

?>

<!doctype html>
<html>
<head>
<link href="../Css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="Css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../Css/style.css" rel="stylesheet" type="text/css">
<link href="Css/style.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.js"></script>
	<script src="js/npm.js"> </script>
	<script src="js/bootstrap.js"> </script>

	<script src="../js/jquery.js"></script>
	<script src="../js/npm.js"> </script>
	<script src="../js/bootstrap.js"> </script>
	<script src="../js/jquery.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	

<meta charset="utf-8">
<title> Login </title>
</head>

<body style="background-image: url(Image/thumb.jpg)">

<div class="container" style="margin-top: 80px;"> 
	
	<div class="col-md-4">
	
		
	
	</div>
	
	
	<div class="col-md-4 ">
	
	<div class=" alert-danger">
		<?php  
	if(isset($Obj_Controller->Error_Mgs)){
			
		echo 	"<h3 style = \"padding:10px;\">".	 $Obj_Controller->Error_Mgs,  "</h3>";	
			
		}
		
		 ?>
		
	</div>
	 
	 <div class=" alert-success">
	 			<?php  
	if(isset($Obj_Controller->Suc_Mgs)){
			
	echo 	"<h3 style = \"padding:10px;\">".	 $Obj_Controller->Suc_Mgs,  "</h3>";
			
		}
		
		 ?>
	 	
	 </div>
		 
<div class="alert alert-success response " style="display: none;">
 
  <span class="spinner-border spinner-border-lg"> </span>
   <h3> Validating Detials Please Wait...</h3>
</div>
		
		
<div class="alert alert-danger mgs-error alert-dismissible"  style="display: none;"> 
		
		
		</div>
			
<form  action=""  method="post" class="well" id="Login_Form" >
				
				<h2 class="text-primary"> Admin Login</h2>
				
			<div class="form-group">
				
			<label> Enter Your Email</label>
				
				<input type="text" name="Email" ng-model  = "email" placeholder="Email" id="Email" class="form-control" maxlength="30px;">
				
			</div>	
			
			<p ng-bind = "email"> </p>
			
			<div class="form-group">
			<label> Password</label>
			
			<input type="password" name="Password" id="Password" placeholder="Password" class="form-control">
				
			</div>	
			
			
			<div class="form-group">
			
			<input type="submit" name="Submit" value="Login" class="btn btn-primary btn-block" id="Submit">
				
			</div>	
			<div class="form-group">
				
			</div>	
				
			</form>
			
	<div class="well">
		
		Dont Have Account Yet ? <br> Pls Register Here <a href=""> Register</a>
		
	</div>
		
	</div>
	
</div>

</body>
</html>

	

<script  type="text/javascript">


$(document).ready(function(){
$("#Login_Form").submit(function(e){
	//e.preventDefault();
	

	var Email = $('#Email').val();
	
	if(Email == ""){
	$(".mgs-error").html("<h4> Email is Required </h4>");
	$(".mgs-error").fadeIn();
	$("#Email").css("border-color","red");
		
	$("#Email").focus();
	return false;
		
	}
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(!Email.match(mailformat)){
		
	$(".mgs-error").html("<h4> Invalid Email </h4>");
	$(".mgs-error").fadeIn();
	$("#Email").css("border-color","red");
		
		$("#Email").focus();
		return false;
	}
	
	var Password = $("#Password").val();
	
	if(Password == ""){
		
	$(".mgs-error").html(" <h4> Password Is Required </h4>");
	$(".mgs-error").fadeIn();
	$("#Password").css("border-color","red");
	$("#Pasword").focus();	
	return false;
		
	} 

	$(".response").css("display","block")
	
	 
	
});// end of form submit button 
	
	
	
});///end ready functin ------
</script>