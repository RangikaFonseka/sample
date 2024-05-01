<?php

require_once("../dBConnection.php");

require_once "adminfun.php";



if(isset($_POST["Sign_submit"])){


	$userName=$_POST["uname"];
	$email=$_POST["email"];
	$nic=$_POST["nic_Number"];
	$pwd=$_POST["psw"];
	$repwd=$_POST["psw-repeat"];
	
	


	$isValidEmptySignInput=empty_SignInput($userName,$pwd,$email,$nic,$repwd);
	$isValidUsername=checkUsername($userName);
	//$isValidEmail=checkEmail($email);
	$isValidPwd=checkPwd($pwd,$repwd);
	$isUserExists=UserExists($admin_connection,$userName,$email);



	if($isValidEmptySignInput==! false){


	    exit();

	}

	if($isValidUsername==!false){

			header("Location:../signPage.php?error=Invalid_Username");
	        exit();



	}
	if($isValidPwd==!false){

			header("Location:../signPage.php?error=Invalid_Password");
			exit();



	}
	if($isUserExists==!false){

			header("Location:../signPage.php?error=UserExists");
			exit();


	}


	  setupSinupInfo($admin_connection,$userName,$email,$nic,$pwd);



}



?>