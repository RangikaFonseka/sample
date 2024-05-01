<?php


require_once("../dBConnection.php");
require_once "adminfun.php";




if(isset($_POST["newsubmit"])){


	$userName=$_POST["uname"];
	$email=$_POST["email"];
	$nic=$_POST["nic_Number"];
	$dBName=$_POST["dbName"];
	$pwd=$_POST["psw"];
	$repwd=$_POST["psw-repeat"];
	
	

	
	$isValidEmptyNewSignInput=empty_SignInput($userName,$pwd,$email,$nic,$repwd,$dBName);
	$isValidUsername=checkUsername($userName);
	//$isValidEmail=checkEmail($email);
	$isValidPwd=checkPwd($pwd,$repwd);
	$isUserExists=UserExists($admin_connection,$userName,$email,$dBName);



	

	if($isValidEmptyNewSignInput==! false){

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


      setupSinupInfo($admin_connection,$userName,$email,$nic,$pwd,$dBName);

	  createDataBase($dBName);

      $myconnection=mysqli_connect("localhost","root","",$dBName);

	  createAdminInfoTable($myconnection);
	  createOrdersaveTable($myconnection);
	  createitemSaveTable($myconnection);
	  createProductTable($myconnection);
	  createRealDashUserTable($myconnection);
	  createUserTable($myconnection);
	  createUsersTable($myconnection);
	  createActivityLogTable($myconnection);

}





?>