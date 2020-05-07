<?php 
session_start();
if(!isset($_SESSION["Email"])){ header("location:?View=login");}
$Obj_Controller = new Controller();
$Obj_Controller->Add_Student();
include("navbar.php");
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include("sidebar.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-primary"> ASSIGN PROJECT TO STUDENT</h1>
          
        
          
          <div class="row"> 
          
          <div class="col-md-5 well col-md-offset-3"> 
          
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
           
          
          <form action="" method="post" role="form"> 
          <div class="form-group">
          	<label>Student Name :</label>
          	
          	<input type="text" name="name" class="form-control">
          	
          </div>
           
           
            <div class="form-group">
          	<label> Matric Number :</label>
          	
          	<input type="text" name="matric" class="form-control">
          	
          </div>
          
          
            <div class="form-group">
          	<label> Student Email :</label>
          	
          	<input type="email" name="email" class="form-control">
          	
          </div>
          
          
            <div class="form-group">
          	<label> Program :</label>
          	
          	<select class="form-control" name="program">
          		<option value="BSC">B.Sc </option>
          		<option value="MSC">M.Sc </option>
          			<option value="PGD"> P.gd </option>
          		
          	</select>
          	
          </div>
          
          
        <div class="form-group">
     <input type="submit" name="Submit_Student" value="Assign Project Topic" class="btn btn-block btn-success">
          	
	  </div>
         
         </form>
          
          </div>
          
         
        </div>
      </div>
    </div>
      


<div class="row">
<?php include("footer.php");
	?>
</div>