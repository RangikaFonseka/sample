<?php  
require 'dBConnection.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .summary {
            background-color: #f2f2f2;
            padding: 20px;
            margin-bottom: 20px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
        }
    </style>
  <title>
    Admin Panel
  </title>  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />  
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">  
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">
function dynamic(selectItem) {
  if (selectItem === "addCustomer") {

    document.getElementById("dynamic_content").style.display = "block";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('dynamic_content').innerHTML = this.responseText;
      }
    };
    
    xmlhttp.open("GET", "adminSignUp.php", true);
    xmlhttp.send();
    document.getElementById("dashboard").style.display = "none";
  }

  else if(selectItem==="dashBoard"){

     document.getElementById("dashboard").style.display = "block";
     document.getElementById("dynamic_content").style.display = "none";

  }

  else if(selectItem==="customer"){

    document.getElementById("dynamic_content").style.display = "block";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('dynamic_content').innerHTML = this.responseText;
      }
    };
    
    xmlhttp.open("GET", "pages/customerTable.php", true);
    xmlhttp.send();
    document.getElementById("dashboard").style.display = "none";


  }
  else if(selectItem==="report"){

    document.getElementById("dynamic_content").style.display = "block";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('dynamic_content').innerHTML = this.responseText;
      }
    };
    
    xmlhttp.open("GET", "pages/filterPages/new.php", true);
    xmlhttp.send();
    document.getElementById("dashboard").style.display = "none";
  }
  else if(selectItem==="userReport"){

    document.getElementById("dynamic_content").style.display = "block";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('dynamic_content').innerHTML = this.responseText;
      }
    };
    
    xmlhttp.open("GET", "pages/filterPages/new.php", true);
    xmlhttp.send();


    document.getElementById("dashboard").style.display = "none";


  }

  else if(selectItem==="appsetting"){

    document.getElementById("dynamic_content").style.display = "block";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('dynamic_content').innerHTML = this.responseText;
      }
    };   
    xmlhttp.open("GET", "pages/appsetting.php", true);
    xmlhttp.send();
    document.getElementById("dashboard").style.display = "none";
  }

}
function editData(id,name,price){
  var ID=id;

var modalHTML = `
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-primary" id="exampleModalLongTitle">Invoice Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h6>Invoice No</h6>
                                        </div>
                                         <br>
                                    <br>
                                    </div>
                                     <div class="row modal-item-title">

                                    <div class="col-md-3">Name</div>

                                <form action="pages/productEdit.php" method="post" enctype="multipart/form-data">

    <!-- Hidden Input for ID -->
    <input type="hidden" id="id" name="id" value=${ID}>

    <div style="margin-top: 10px;">
        <!-- Input for Product Name -->
        <label for="name" style="color: #336699;">Product Name:</label>
        <input type="text" id="name" name="name" style="margin-left: 12px;">
    </div>

    <div style="margin-top: 10px;">
        <!-- Input for Product Price -->
        <label for="price" style="color: #336699;">Product Price:</label>
        <input type="text" id="price" name="price" style="margin-left: 12px;">
    </div>

    <div style="margin-top: 10px;">
        <!-- Input for Product Image -->
        <label for="image" style="color: #336699;">Select Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required style="margin-left: 12px;">
    </div>

    <div style="margin-top: 15px;">
        <!-- Submit Button -->
        <input type="submit" name="imgSubmit" value="Upload Image" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
    </div>

</form>

                                   </div> 
                                  </div>  
                                </div>
                              </div>  
            `;            
            document.getElementById('modalContainer').innerHTML = modalHTML;          
            $('#exampleModalCenter').modal('show');
}
</script>

</head>
<body class="g-sidenav-show  bg-gray-200">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0">
        <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Smart Cafe Admin Portal</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " onclick="dynamic('dashBoard')">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" onclick="dynamic('addCustomer')" >
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Add New Customer</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " onclick="dynamic('customer')">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Customer Update</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link text-white " href="pages/filterPages/new.php" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Reports Generate</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " onclick="dynamic('appsetting')" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Print</span>
          </a>
        </li> -->
      </ul>
    </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
      <a class="btn bg-gradient-primary mt-4 w-100" href="../loginPage.php" material-dashboard-pro?ref="sidebarfree" type="button">Launch App</a>
     
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  	 <div class="container-fluid py-4">
      <div class="row min-vh-80 h-100">
        <div class="col-12">
 <div id="dynamic_content">  
 </div>
 <div id="modalContainer"></div>          
   <div id="dashboard" style="background-color:#a428520f;padding:15px">
    <div class="header">
        <h2>Admin Dashboard</h2>
    </div>
      <br>
     <div id="dashboard">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
           <div class="card">
             <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today Income</p>
                <h4 class="mb-0"><?php echo $totalAmount?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>

              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                <h4 class="mb-0"><?php echo $totalUsers ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Orders</p>
                <h4 class="mb-0"><?php echo $totalOrder?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div>
          </div>
        </div>      
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Website Views</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>               
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                   <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Daily Sales </h6>
              <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 4 min ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                   <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Completed Tasks</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">just updated</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row mt-4" style="background-color: #ffffffb0;">
        <?php
          include "productDisplay.php";
          echo"<hr>";
          echo "<h6>Most Item Qty %</h6>";
          echo "<p>Top 3 Items available in item qty</p>";
          echo "<p style='background-color:#f0ccd7; width:10%;'>Item Id: 7</p>";
          echo "<p style='background-color:#c8d8ec; width:10%;'>Item Id: 8</p>";
          echo "<p style='background-color:#f0e1ce; width:10%;'>Item Id: 6</p>";
        ?>
      </div>
      </div>
      </div>

S
          
  <?php 
    include("footer.php");
  ?>
  </main>
</body>
</html>