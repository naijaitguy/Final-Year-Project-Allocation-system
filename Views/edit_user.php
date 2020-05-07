<?php 
session_start();
if(!isset($_SESSION["Email"])){ header("location:?View=login");}
$Obj_Controller = new Controller();
$Obj_Controller->Add_User();
include("navbar.php");
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include("sidebar.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-primary">	EDIT USER </h1>
  
        <form action="" method="post" class="col-md-4 well">
        	
    <div class=" alert-danger">
		<?php  
	if(isset($Obj_Controller->Error_Mgs)){
			
		echo 	"<h5 style = \"padding:10px;\">".	 $Obj_Controller->Error_Mgs,  "</h5>";	
			
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
        	 <?php 
			$Result = $Obj_Controller->Get_User_By_Id($_GET["id"]);  
			foreach( $Result as $key=>$value){
				?>
        	<!-------------------->
        	<div class="form-group">
        		<label> Email: </label>
<input type="email" name="Email" class="form-control" value="<?php echo   $Result[$key]["Email"];?>" disabled>
        		
        	</div>
        	<!-------------------->
        	
        	<!-------------------->
        	<div class="form-group">
        		<label> Password: </label>
        		
        		<input type="password" name="Password" class="form-control" value="<?php echo   $Result[$key]["Password"];?>" disabled>
        		
        	</div>
        	<!-------------------->
        	
        	
        	<!-------------------->
        	<div class="form-group">
        		<label> Confirm Password: </label>
        		
        		<input type="password" name="Confirm_Password" class="form-control" value="<?php echo   $Result[$key]["Password"];?>" disabled>
        		
        	</div>
        	<!-------------------->
        	<div class="form-group">
        		<label> Previleges: </label>
        		
        		<select name="Role" class="form-control">
        		<option value="<?php echo   $Result[$key]["Role"];?>"> <?php echo   $Result[$key]["Role"];?></option>
        			<option value="-1"> User</option>
        			<option value="1"> Admin</option>
        		</select>
        		<span class="text-danger"> Note: Admin can Add New User </span>
        	</div>
        	<!-------------------->
        	<div class="form-group">
        		<label> Full Name: </label>
        		
        		<input type="text" name="Name" class="form-control" value="<?php echo   $Result[$key]["Name"];?>">
        		
        	</div>
        	<!-------------------->
        	
        	<!-------------------->
        	<div class="form-group">
        		<input type="submit" class="btn btn-success" name="Submit_User" value="Save Changes">
        	</div>
        	<!-------------------->
        	
        	
        	
        </form>
         
         <?php }?>
         
      </div>
    </div>


<div class="row">
<?php include("footer.php");
	?>
</div>