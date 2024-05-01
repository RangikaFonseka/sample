
<?php



require_once("../dBConnection.php");

function empty_NewInput($userName,$pwd,$email,$nic,$repwd,$dbName){
$result;

	if(empty($userName) || empty($pwd) || empty($dbName) ){

		$result=true;
		
	}

	else{



		$result=false;
	}
	return $result;



}



function empty_SignInput($userName,$pwd,$email,$nic,$repwd){
	$result;
	if(empty($userName) || empty($pwd) || empty($email) || empty($nic) || empty($repwd)){

			$result=true;



	
	}

	else{


		$result=false;
	}

	return $result;

}




	function checkUsername($userName){

			$result;
			if(!preg_match("/^[a-zA-Z0-9]*$/",$userName)){
         
              $result = true;


			}

			else {

				$result=false;

			}

			return $result;

	 }


function checkPwd($pwd,$repwd){

			$result;

			if($pwd===$repwd){
         
              $result = false;


			}

			else {

				$result=true;

			}

			return $result;

	 }


function UserExists($connection,$userName,$email,$dbName){

$sql="select * from admininfo where  adminName=? OR adminEmail=? OR dBName=?;";

$stmt=mysqli_stmt_init($connection);

if(!mysqli_stmt_prepare($stmt,$sql)){

	header("Location:../adminSignUp.php?error=stmtfaild");
	exit();
}

mysqli_stmt_bind_param($stmt,"sss",$userName,$email,$dbName);
mysqli_stmt_execute($stmt);
$resultData=mysqli_stmt_get_result($stmt);

if($rowData = mysqli_fetch_assoc($resultData)){

	return $rowData;

}

else {


	return false;
}

   mysqli_stmt_close($stmt);

}


function login($connection,$userName,$pwd){

	 $valid_User_Exist=UserExists($connection,$userName,$userName);

	 if($valid_User_Exist===false){


		
	    exit();

	 }

	  $hashedpsw=$valid_User_Exist["adminPassword"];
	  $verifypsw=password_verify($pwd,$hashedpsw);

	  if( $verifypsw===false){

	    header("Location:../errorMsg.php");  
	  		
	  } 

	  else if($verifypsw===true){

	  	session_start();
	  	$_SESSION["dBName"]=$valid_User_Exist["dBName"];
		$error=$_SESSION["dBName"];
       header("Location: ../adminPanal.php?error=$error");

	  }

}


function setupSinupInfo($connection,$userName,$userEmail,$nic,$pwd,$dBName){

	$sql = "INSERT INTO admininfo(adminName,adminEmail,adminNic,adminPassword,dBName) values(?,?,?,?,?);";

	$stmt = mysqli_stmt_init($connection);

	if(!mysqli_stmt_prepare($stmt,$sql)){

		header("Location:../adminSignUp.php?error=stmt_faild");
		exit();
	}


	$hashedpassword=password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"sssss",$userName,$userEmail,$nic,$hashedpassword,$dBName);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);


}

function createDataBase($dbName) {
   
    $servername = "localhost";
    $username = "root";
    $password = "";

  
    $conn = new mysqli($servername, $username, $password);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

}





function createAdminInfoTable($conn) {
    
    $sql ="CREATE TABLE admininfo(
   adminID int(16) AUTO_INCREMENT NOT NULL,
   adminName varchar(32) NOT NULL,
   adminNic varchar(10) NOT NULL,
   adminEmail varchar(32) NOT NULL,
   adminPassword varchar(255) NOT NULL,
   PRIMARY KEY (adminID));";

    $conn->query($sql);
}



function createOrdersaveTable($conn) {
    
   $sql="CREATE TABLE ordersave (
  OrderId int(11) NOT NULL AUTO_INCREMENT,
  PersonId int(11) DEFAULT NULL,
  amount int(128) NOT NULL,
  order_Date date NOT NULL,
  PRIMARY KEY (OrderId),
  KEY PersonId(PersonId));";


    $conn->query($sql);
}



function createFoodPriceTable($conn) {
    
    $sql="CREATE TABLE food_price(
  detect_ID int(12) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  id varchar(20) NOT NULL,
  price float NOT NULL,
  PRIMARY KEY (id),
  KEY detect_ID (detect_ID)
);";



    $conn->query($sql);
}




function createitemSaveTable($conn) {
    
    $sql = "CREATE TABLE itemsave(
  ID int(11) NOT NULL AUTO_INCREMENT,
  order_ID int(11) NOT NULL,
  item_ID int(11) NOT NULL,
  item_qty int(11) NOT NULL,
  PRIMARY KEY (ID));";




    $conn->query($sql);
}



function createProductTable($conn) {
    
   $sql="CREATE TABLE product (
  id int(11) NOT NULL AUTO_INCREMENT,
  description varchar(20) NOT NULL,
  image varchar(255) DEFAULT NULL,
  price int(11) DEFAULT NULL,
  PRIMARY KEY (id));";

        $conn->query($sql);
}



    function createRealDashUserTable($conn) {
    
    $sql="CREATE TABLE realtime_dash_user(
  order_id varchar(20)  NOT NULL,
  Item_ID varchar(20) NOT NULL,
  Item_qty int(11) NOT NULL,
  price float NOT NULL,
  PRIMARY KEY (Item_ID));";


        $conn->query($sql);
}



function createUserTable($conn) {
    
    $sql = "CREATE TABLE user (
  userId int(12) NOT NULL AUTO_INCREMENT,
  userName varchar(32) NOT NULL,
  userNic varchar(10) NOT NULL,
  tele_number int(10) NOT NULL,
  userEmail varchar(32) NOT NULL,
  userPassword varchar(255) NOT NULL,
  hash_token varchar(64) DEFAULT NULL,
  exp_time datetime DEFAULT NULL,
  otp int(11) DEFAULT NULL,
  otp_Exp datetime(6) DEFAULT NULL,
  PRIMARY KEY (userId),
  UNIQUE KEY hash_token (hash_token)
);";


        $conn->query($sql);
}




function createUsersTable($conn) {

$sql="CREATE TABLE users (
  user varchar(10) NOT NULL,
  api varchar(50) NOT NULL,
  info char(1) NOT NULL DEFAULT 'v');";

 $conn->query($sql); 

}




function createActivityLogTable($conn) {

$sql="CREATE TABLE activity_log (
  id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  Update_time datetime DEFAULT NULL,
  user_id varchar(255) DEFAULT NULL,
  action varchar(255) DEFAULT NULL
);";


 $conn->query($sql); 
  


}

?>
