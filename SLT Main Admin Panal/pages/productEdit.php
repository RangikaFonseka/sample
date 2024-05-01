<?php
include("../../dBConn.php");
       
if (isset($_POST["imgSubmit"])) {


    $productID = $_POST["id"];
    $productName = $_POST["name"];
    $productPrice = $_POST["price"];


    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

    $update_image = $_FILES['image']['name'];
    $update_image_size = $_FILES['image']['size'];
    $update_image_tmp_name = $_FILES['image']['tmp_name'];

    $update_image_folder = 'uploaded_img/'.$update_image;
 
}


    $recode_query_data = "UPDATE product SET description = ?, price = ? , image=? WHERE id = ?";
    
    $stmt = mysqli_prepare($connection, $recode_query_data);

    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, "sisi", $productName, $productPrice,$update_image,$productID);

      
        $result = mysqli_stmt_execute($stmt);

        if ($result) {

           header("location:../adminPanal.php");
        } else {
            
            header("Location:productEdit.php?error=error2");
        }

    mysqli_stmt_close($stmt);

    }

}


?>