<?php 

class Initializer { 

public $View;

public function __construct(){
	
	if(isset($_GET["View"])){
	
	$this->View = $_GET["View"];}
	
	if(empty($this->View))
	
	{ $this->View = "login";} 
	
	else{ $this->View = $_GET["View"];
		 
		 spl_autoload_register(array($this,"AutoLoadView"));
		 spl_autoload_register(array($this,"AutoLoadinclude")); 
		 spl_autoload_register(array($this,"AutoLoadcontroller")); 
		 
		}

}//end of function------------
	
	
	public function AutoLoadView(){
		
		$File_Name = "Views/".$this->View.".php";
		
		if(is_readable($File_Name)){
			
		require($File_Name);
	
		}
	}
	//////////////////////////////////
	
	public function AutoLoadinclude($class){
		
		$File_Name = "Include/".$class.".php";
		
		if(is_readable($File_Name)){
			
		require($File_Name);
	
		}
	}

////////////////////////////////////////
	
//////////////////////////////////
	
	public function AutoLoadcontroller($class){
		
		$File_Name = "Controller/".$class.".php";
		
		if(is_readable($File_Name)){
			
		require($File_Name);
	
		}
	}
	
/////////////////////////////////	
// end of class----------------
}


$Obj_Initializer = new Initializer();

if($Obj_Initializer->View == "login") {
	
$Obj_Initializer->AutoLoadcontroller("Controller");
$Obj_Initializer->AutoLoadView();
	
}else{ 
$Obj_Initializer->AutoLoadcontroller("Controller");
$Obj_Initializer->AutoLoadinclude("header");
$Obj_Initializer->AutoLoadView();
$Obj_Initializer->AutoLoadinclude("footer");

}




?>