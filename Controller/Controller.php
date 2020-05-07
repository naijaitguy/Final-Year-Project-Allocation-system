<?php
include("Model/Context.php");

//include("../Model/Context.php");

class Controller extends Db_Context{
	//////////////-----------variables-------------
	public $Error_Mgs;
	public $Suc_Mgs;
	public $Email;
	public $Password;
	public $Name;
	public $User_Name;
	public $User_Email;
	private $User_Password;
	
	//////////////////
	public function Login(){
	if(isset($_POST["Submit"])){
			
	$Email = $_POST["Email"];	
	$Passsword = $_POST["Password"];
			
	if(empty($Email)){$this->Error_Mgs = "Email Field is  Required "; return false;	} 
			
	if(empty($Passsword)){$this->Error_Mgs = "Password  Field is Required "; return false;	} 		
		
	$Validate_Email =  $this->Validate_Email($Email);
	if($Validate_Email == false){ $this->Error_Mgs = "Invalid Email Address  "; return false; }
	$this->Email = $Validate_Email;
	$this->Password = $Passsword;
	
	$sql = "SELECT * FROM users WHERE Email='$this->Email' AND Password = '$this->Password'";

	$Rows = $this->Select($sql);
	if($Rows == false){ $this->Error_Mgs ="Invalid Email/Password Combination"; return false;}
		
		foreach($Rows as $key=>$value){
			
		$this->Name = $Rows[$key]["Name"];
		$last_Login = $Rows[$key]["Last_Login"];
		$role = $Rows[$key]["Role"];
			$id = $Rows[$key]["ID"];
		}
		
		session_start();
		$_SESSION["Email"] = $this->Email;
		$_SESSION["Name"] = $this->Name;
		$_SESSION["Last_Login"] = $last_Login;
		$_SESSION["Role"] =  $role;
		$_SESSION["Role"] =  $id;
		
		$date = date("D M Y  h:i:sa" );
	$sql_up = "UPDATE users SET Last_Login= '$date' WHERE Email = '$this->Email' ";	
				
if($this->Update($sql_up) > 0){
     	header("location:?View=home");}
	
		}// End of if is set----
		
		
	}///end of function Login
	
	///////////////////////////////////////////--------------------------///////////////////
	public $Project_topic;
	public $Added_Date;
	public $Supervisor;
	public $Added_By;
	public $Area;
	public $program;
	public $Avialbility;
	public function Add_Project(){
		
if(isset($_POST["Submit_Project"])){
			
if(empty($_POST["supervisor"])||empty($_POST["area"])||empty($_POST["topic"])|| empty($_POST["program"]))
{ $this->Error_Mgs = "! All Fields Are Required ";}else{
	
	$Topic = $this->Test_Input($_POST["topic"]);
	$Area = $this->Test_Input($_POST["area"]);
	$Program = $this->Test_Input($_POST["program"]);
	$Supervisor = $this->Test_Input($_POST["supervisor"]);
	
	$this->Project_topic =$this->Escape_sql_injection($Topic);
	$this->Area = $this->Escape_sql_injection( $Area);
	$this->Program =$this->Escape_sql_injection( $Program);
	$this->Supervisor = $this->Escape_sql_injection($Supervisor);
	$this->Added_Date = date("Y-m-d");
	$this->Added_By = $this->Escape_sql_injection($_SESSION["Name"]);
	$this->Avialbility = "True";
	
	$Sql = "SELECT * FROM project WHERE Project_Topic = '$this->Project_topic'";
	$result = $this->Count_Num_rows($Sql);
	if($result > 0){ $this->Error_Mgs = " Project Topic Already Exist ";} else{
	
	$Sql_Insert = "INSERT INTO project (Project_Topic,Program,Date_Added,Added_By,Supervisor,Area_Of_Knowledge,Avialbility)VALUES ('$this->Project_topic','$this->Program','$this->Added_Date','$this->Added_By','$this->Supervisor','$this->Area','$this->Avialbility')";

	$Insert_Result = $this->Insert_Data($Sql_Insert);
	if($Insert_Result >0){ $this->Suc_Mgs = "Project Added Successful"; }else{$this->Error_Mgs = "Could Not Add Project";}
		
	
	}
	
	
}
			
			
		}
		
		
	}
	
	////---------------------------------//////////////////////////////////
	
	public function Get_Project_By_Id($id){
			
		$secure_Id = $this->Escape_sql_injection($id);	
		$Get_Sql= "SELECT * FROM project WHERE ID = '$secure_Id'";
		$Get_Result = $this->Select($Get_Sql);
		if($Get_Result != false){return($Get_Result);}
		
		
	}	
	///////-------------------------------------------//////////////////
	
	public function Get_Project(){
		$Get_Sql= "SELECT * FROM project";
		$Get_Result = $this->Select($Get_Sql);
		if($Get_Result != false){return($Get_Result);}
		
		
	}	
	
	///////------------/////////////////////////////
	
	public function Assign_Project($program){
		
     $sql= "SELECT * FROM project WHERE Availability = 'True' AND Program = '$program' ORDER BY RAND() LIMIT 1";
	 $result = 	$this->Select($sql);
		return($result);
		
	}
	/////////////////////////--------------///////////////////////////////////////////////
	public $Student_Name;
	public $Matric_Num;
	
	public $Student_Email;
	public $Date;
	public $Project_Id;
	
	public function Add_Student(){
	if(isset($_POST["Submit_Student"])){
			
if(empty($_POST["email"])||empty($_POST["name"])||empty($_POST["matric"])|| empty($_POST["program"])){ $this->Error_Mgs = "! All Fields Are Required ";}else{
	
	$student_name= $this->Test_Input($_POST["name"]);
	$email = $this->Test_Input($_POST["email"]);
	$matric = $this->Test_Input($_POST["matric"]);
	$program = $this->Test_Input($_POST["program"]);
	$date = date("Y-m-d");
	
	if(strlen($matric) != 12){$this->Error_Mgs =  "Matric Number Must be 12 characters "; return;}
	
	$this->Student_Email= $this->Escape_sql_injection($email);
	$this->Student_Name = $this->Escape_sql_injection($student_name);
	$this->program = $this->Escape_sql_injection($program);
	$this->Date = $date;
	$this->Matric = $this->Escape_sql_injection($matric);
	
	$Sql = "SELECT * FROM student WHERE Email = '$this->Student_Email'";
	$result = $this->Count_Num_rows($Sql);
	if($result > 0){ $this->Error_Mgs =  "Email Address Already Exist "; return;}
	
	$Sql = "SELECT * FROM student WHERE Matric_Number = '$this->Matric'";
	$result = $this->Count_Num_rows($Sql);
	
	if($result > 0){ $this->Error_Mgs = " Student With the Matric Number ". $this->Matric. " Already Exist  ";} else{
	
	$Ass_Result = $this->Assign_Project($this->program);
	if($Ass_Result == false){ $this->Error_Mgs = "Project Not Available in the ". $this->program ." Catergory Pls Add Projects  "; return;}
	foreach($Ass_Result as $key=>$value){
	$this->Project_Id = $Ass_Result[$key]["ID"];
		
	}
		
	$Sql_Insert = "INSERT INTO student (Name,Matric_Number,Program,Date,Email,Project_Id)VALUES ('$this->Student_Name','$this->Matric','$this->program','$this->Date','$this->Student_Email','$this->Project_Id')";

	$Insert_Result = $this->Insert_Data($Sql_Insert);
	if($Insert_Result >0){
	$sql_Update = "UPDATE project SET Availability ='False' WHERE ID = '$this->Project_Id' ";
	$Update_Result = $this->Update($sql_Update);
	if($Update_Result > 0)	{ $this->Suc_Mgs = "Project Topic Assigned Successful";}
	 }
	else{$this->Error_Mgs = "Could Not Add Student";}
		
	}
	
		
}
			
			
		}
		
	}
	
	public function Get_Student(){
		$Get_Sql= "SELECT * FROM student";
		$Get_Result = $this->Select($Get_Sql);
		if($Get_Result != false){return($Get_Result);}
		
		
	}	
	
	
	public function Get_Combine_Info(){
		$Get_Sql= "SELECT * FROM student a , project b WHERE a.Project_Id = b.ID;";
		$Get_Result = $this->Select($Get_Sql);
		if($Get_Result != false){return($Get_Result);}
		
		
	}	
	
	
	public function Add_User(){
	if(isset($_POST["Submit_User"])){
			
if(empty($_POST["Name"])||empty($_POST["Password"])||empty($_POST["Confirm_Password"])|| empty($_POST["Email"])||empty($_POST["Role"])){ $this->Error_Mgs = "! All Fields Are Required ";}else{
	
	$name= $this->Test_Input($_POST["Name"]);
	$email = $this->Test_Input($_POST["Email"]);
	$Password = $this->Test_Input($_POST["Password"]);
	$Confirm_Password = $this->Test_Input($_POST["Confirm_Password"]);
	$date = date("Y-m-d");
	$Role = $_POST["Role"];
	
	if($Password != $Confirm_Password){ $this->Error_Mgs =  "Password do not match try Again "; return;}
	
	if($_SESSION["Role"] != 1){ $this->Error_Mgs =  "You Do Not Have Permision to Add User "; return;}
	
	$this->User_Email= $this->Escape_sql_injection($email);
	$this->User_Name = $this->Escape_sql_injection($name);
	$this->User_Password = $this->Escape_sql_injection($Password);
	$this->Date = $date;
	
	
	$Sql = "SELECT * FROM users WHERE Email = '$this->User_Email'";
	$result = $this->Count_Num_rows($Sql);
	if($result > 0){ $this->Error_Mgs =  "Email Address Already Exist ";}else{
	
		
	$Sql_Insert = "INSERT INTO users (Name,Date,Email,Password,Role)VALUES ('$this->User_Name','$this->Date','$this->User_Email','$this->User_Password','$Role')";

	$Insert_Result = $this->Insert_Data($Sql_Insert);
	if($Insert_Result >0){
		
	 $this->Suc_Mgs = "User Added Successful";
	 }
	else{$this->Error_Mgs = "Could Not Add User";}
		
	}
	
		
}
			
			
		}
		
	}
	
	public function Get_User(){
		$Get_Sql= "SELECT * FROM users";
		$Get_Result = $this->Select($Get_Sql);
		if($Get_Result != false){return($Get_Result);}
		
		
	}
	
	public function Get_User_By_Id($id){
			
		$secure_Id = $this->Escape_sql_injection($id);	
		$Get_Sql= "SELECT * FROM users WHERE ID = '$secure_Id'";
		$Get_Result = $this->Select($Get_Sql);
		if($Get_Result != false){return($Get_Result);}
		
		
	}
	
}




?>