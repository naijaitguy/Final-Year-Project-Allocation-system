<?php 
session_start();
if(!isset($_SESSION["Email"])){ header("location:?View=login");}
include("navbar.php");
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include("sidebar.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">assign</h1>

         
      </div>
    </div>


<div class="row">
<?php include("footer.php");
	?>
</div>