<?php 
session_start();
if(!isset($_SESSION["Email"])){ header("location:?View=login");}
$Obj_Controller = new Controller();

include("navbar.php");
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include("sidebar.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-primary">PROJECT ALLOCATION DETIALS</h1>
          
        
           <div class="row"> 
          
         
          
          <div class="col-md-12"> 
       

          <div class="table-responsive">
          <table id="example" class="table table-bordered table-striped table-hover table-bordered" style="width:100%">
           <thead> 
            <tr class="text-primary" style="text-align: center;">
             	<th>STUDENT NAME </th>
             	<th>MATRIC NUMBER </th>
             	<th> PROGRAM </th>
             	
             	<th>PROJECT TOPIC </th>
             		<th> SUPERVISOR </th>
             			<th> DATE ASSIGN </th>
             	
             	
               </tr>
             </thead>
              	<tbody> 
               	<?php 
				   
				   $Rows =  $Obj_Controller->Get_Combine_Info();
				   
				   foreach($Rows as $key=>$value){
					   
					   ?>
					 
				<tr>   
				 <td> <?php echo   $Rows[$key]["Name"];?> </td>
              	  <td> <?php echo   $Rows[$key]["Matric_Number"];?> </td>
             	    <td> <?php echo   $Rows[$key]["Program"];?> </td>
              	     <td> <?php echo   $Rows[$key]["Project_Topic"];?> </td>
              	     <td> <?php echo   $Rows[$key]["supervisor"];?> </td>
              	     <td> <?php echo   $Rows[$key]["Date"];?> </td>
              	    
              	     

              	      
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
    </div>
      


<div class="row">
<?php include("footer.php");
	?>
</div>