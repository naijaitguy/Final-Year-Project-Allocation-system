<?php 
session_start();
if(!isset($_SESSION["Email"])){ header("location:?View=login");}
$Obj_Controller = new Controller();

include("navbar.php");

?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 col-md-2 sidebar">
          <?php include("sidebar.php"); ?>
          
        </div>
        <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-primary">PROJECT DETIALS</h1>
          
          <div class="row "> 
          
         
          
          <div class="col-md-12"> 
       

          <div class="table-responsive">
          <table id="example" class="table table-bordered table-striped table-hover table-bordered" style="width:100%">
           <thead> 
            <tr class="text-primary" style="text-align: center;">
             	<th> PROJECTTOPIC </th>
             	<th> PRO GRAM </th>
             	<th>DATE ADDED </th>
             	<th> ADDED BY </th>
             	<th> SUPERVISOR </th>
             	<th> AREA OF USEFULNES </th>
             		<th> AVAI LABILITY </th>
             		<th> ACTION </th>
            
               </tr>
             </thead>
              	<tbody> 
               	<?php 
				   
				   $Rows =  $Obj_Controller->Get_Project();
				   
				   foreach($Rows as $key=>$value){
					   
					   ?>
					 
				<tr>   
				 <td> <?php echo   $Rows[$key]["Project_Topic"];?> </td>
              	  <td> <?php echo   $Rows[$key]["Program"];?> </td>
             	    <td> <?php echo   $Rows[$key]["Date_Added"];?> </td>
              	    <td> <?php echo   $Rows[$key]["Added_By"];?> </td>
              	      <td> <?php echo   $Rows[$key]["supervisor"];?> </td>
              	      <td> <?php echo   $Rows[$key]["Area_Of_Knowledge"];?> </td>
              	      <td> <?php echo   $Rows[$key]["Availability"];?> </td>
<td> <a href="?View=edit_project&id=<?php echo   $Rows[$key]["ID"];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i> </button> </a> 
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
    </div>
      


<div class="row">
<?php include("footer.php");
	?>
</div>