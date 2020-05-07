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
          <h1 class="page-header text-primary">ADD NEW USER </h1>
  
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
        	
        	<!-------------------->
        	<div class="form-group">
        		<label> Email: </label>
        		<input type="email" name="Email" class="form-control">
        		
        	</div>
        	<!-------------------->
        	
        	<!-------------------->
        	<div class="form-group">
        		<label> Password: </label>
        		
        		<input type="password" name="Password" class="form-control">
        		
        	</div>
        	<!-------------------->
        	
        	
        	<!-------------------->
        	<div class="form-group">
        		<label> Confirm Password: </label>
        		
        		<input type="password" name="Confirm_Password" class="form-control">
        		
        	</div>
        	<!-------------------->
        	<div class="form-group">
        		<label> Previleges: </label>
        		
        		<select name="Role" class="form-control">
        			<option value="-1"> User</option>
        			<option value="1"> Admin</option>
        		</select>
        		<span class="text-danger"> Note: Admin can Add New User </span>
        	</div>
        	<!-------------------->
        	<div class="form-group">
        		<label> Full Name: </label>
        		
        		<input type="text" name="Name" class="form-control">
        		
        	</div>
        	<!-------------------->
        	
        	<!-------------------->
        	<div class="form-group">
        		<input type="submit" class="btn btn-success" name="Submit_User" value="Add User">
        	</div>
        	<!-------------------->
        	
        	
        	
        </form>
         
         
         <div class="col-md-8">
         	
          <div class="table-responsive">
          <table id="example" class="table table-bordered table-striped table-hover table-bordered" style="width:100%">
           <thead> 
            <tr class="text-primary" style="text-align: center;">
             	<th>USER NAME </th>
             	
             	
             	<th>EMAIL </th>
             	
             	
             		<th> Action </th>
            
               </tr>
             </thead>
              	<tbody> 
               	<?php 
				   
				   $Rows =  $Obj_Controller->Get_User();
				   
				   foreach($Rows as $key=>$value){
					   
					   ?>
					 
				<tr>   
				 <td> <?php echo   $Rows[$key]["Name"];?> </td>
              	  
              	    <td> <?php echo   $Rows[$key]["Email"];?> </td>
              	     
              	     
<td> <a href="?View=edit_user&id=<?php echo   $Rows[$key]["ID"];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i> </button> </a> 
             	       <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button></td>
              	      
               	 </tr>	
              
                 <?php
            }
				   
				  ?>
           </tbody>
            </table>
          </div>
          
     
         	
         </div>
         
      </div>
    </div>


<div class="row">
<?php include("footer.php");
	?>
</div>