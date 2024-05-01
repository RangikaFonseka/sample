<?php
require_once "../../dBConn.php";
require_once "admindBConn.php";
require_once "adminfun.php";

if(isset($_POST["adminsubmit"])){
	$userName=$_POST["uname"];
	$pwd=$_POST["psw"];

	if(empty_LoginInput($userName,$pwd)!==false){
		

		exit();


	}

	
	else{




		login($admin_connection,$userName,$pwd);
		
	}
}
?>

