<?php 

class DbContext{
	
private	$Dns = "mysql:host=localhost;dbname=sile;charset=utf8mb4";
protected $Db;
	
public function __construct(){
		
try{
	$Connection = new PDO($this->Dns,"root","");
	
	

	echo(" Connection Successful");
}

catch(PDOException $Ex){
	
error_log($Ex->getMessage());
exit('Connection failed');
	
}
	
		
		
}////////////////// end of construct

	
	public function seen (){
		
		
		echo " seen";
	}
	
}///////// end of class



?>