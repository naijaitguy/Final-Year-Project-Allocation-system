     
      <ul class="nav nav-sidebar">
      <li class="active"><a href=""> <h4> <i class="	fa fa-user-circle" ></i> Welcome back <?php echo $_SESSION["Name"]; ?></h4>  </a> <span class="sr-only">(current)  </span></a></li>
           
            <li><a href="?View=profile&id=<?php echo $_SESSION["Role"]; ?>"> <button class="btn btn-success btn-block"> <i class="	fa fa-user-circle" ></i> Manage profile  </button> </a></li>
			  <li><a href="?View=user"><button class="btn  btn-block" style="background-color: #000000; color: #ffffff;"> <i class="fa fa-user-plus" ></i> Add User  </button> </a></li>
            <li><a href="?View=logout"><button class="btn btn-danger  btn-block"> <i class="fa fa-sign-out" ></i> Log Out   </button> </a></li>
          </ul>
        <ul class="nav nav-sidebar">

           
<li><a href="?View=add_project"> <button class="btn  btn-block" style="background-color: #E88508; color: #ffffff;"> <i class="	fa fa-pencil-square-o" > </i> Add New Project </button></a></li>
             
<li><a href="?View=project">  <button class="btn btn-primary btn-block"><i class="fa fa-folder-open" > </i> View Projects  </button> </a></li>
<li><a href="?View=student">  <button class="btn btn-success btn-block"> <i class="fa fa-users" ></i> View Students  </button> </a></li>
 <li> <a href="?View=add_student">  <button class="btn btn-warning btn-block"> <i class="fa fa-plus-square" > </i> Assign project Topic </button> </a></li>
          </ul>
         
       		