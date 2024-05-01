<?php

include("../../dBConn.php");

?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">

            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product table</h6>
              </div>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
               <table class="table">

               
                    <tr class="table-danger">
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                       <th scope="col"></th>
                    
                    </tr>
                 
  
            <tbody>

                  <?php

          $query_data = "select * from product order by id asc;";
            $result_data = mysqli_query($connection,$query_data);
             

          if(mysqli_num_rows($result_data)>0){
                while($row_data = mysqli_fetch_array($result_data)){

                          ?>


                    <tr>
                      <td class="table-primary"><?php echo $row_data['id']; ?></th>
                      <td class="table-warning"><?php echo $row_data['description']; ?></td>
                      <td class="table-light"><?php echo $row_data['price']; ?></td>

                  <td>

                    <button type="button" class="btn btn-outline-danger" onclick="editData(

                    '<?php echo $row_data['id']; ?>',

                   '<?php echo $row_data['description']; ?>',

                   '<?php echo $row_data['price']; ?>' )">

                     Edit

                    </button>

                  </td>


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
