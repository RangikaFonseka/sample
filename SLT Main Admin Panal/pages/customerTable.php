<?php

include("../dBConn.php");

?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">

            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Customer Table</h6>
              </div>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
               <table class="table">

               
                    <tr class="table-danger">
                      <th scope="col">ID</th>

                      <th scope="col">Name</th>
                      <th scope="col">NIC</th>
                     
                      <th scope="col">Email Address</th>
                       <th scope="col">DB Name</th>
                    </tr>
                 
  
            <tbody>

                  <?php

          $query_data = "select * from admininfo order by adminId asc;";
            $result_data = mysqli_query($connection,$query_data);
             

          if(mysqli_num_rows($result_data)>0){
                while($row_data = mysqli_fetch_array($result_data)){

                          ?>


                    <tr>
                      <td class="table-primary"><?php echo $row_data['adminID']; ?></th>
                      <td class="table-warning"><?php echo $row_data['adminName']; ?></td>
                      <td class="table-success"><?php echo $row_data['adminNic']; ?></td>
                      <td class="table-info"><?php echo $row_data['adminEmail']; ?></td>
                      <td class="table-secondary"><?php echo $row_data['dBName']; ?></td>


                   </tr>

                          <?php

                        }


                    }


                  ?>

                  

                    
                  </tbody>

                </table>

              </div>
            </div>


          </div>
        </div>
      </div>
 </div>
