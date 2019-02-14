<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";

  if (isset($_GET['loan_id'])) {
        $loan_id = $_GET['loan_id'];
    }

?>

 <h3 class="page-heading mb-4">Loan verification page</h3>
          <div class="row mb-2">
			
			   <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Borrower Details</h5>
                  <div class="table-responsive table-sales">
                    <table class="table">
                   	<?php 
      	        			$all = $ml->getLoanById($loan_id);
      		        		if ($all) {
      						$row = $all->fetch_assoc();
      						}
		        	 ?>
                      <tbody>
                        <tr>
                          <td>Name: </td>
                          <td class="text-right">
                            <?php echo $row['name']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Expected Loan: </td>
                          <td class="text-right">
                           		 <?php echo $row['expected_loan']; ?> tk
                          </td>
                        </tr>
                        <tr>
                          <td>Total Loan(including interest): </td>
                          <td class="text-right">
                           		 <?php echo $row['total_loan']; ?> tk
                          </td>
                        </tr>
                        <tr>
                          <td>EMI: </td>
                          <td class="text-right">
                           		 <?php echo $row['emi_loan']; ?> tk/month
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


             <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Verify loan</h5>
            <?php 
              
              if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

               $role_id = $_POST['role'];
              $getStatus = $ml->getLoanVerificationStatus($loan_id, $role_id);     
              if ($getStatus) {
                echo $getStatus;
                }
              }
            ?>
					<form  action="" class="form" method="POST" >
            <?php 
                $role = Session::get('role');
             ?>
						<input type="hidden" name="role" value="<?php echo $role; ?>">
					    <div class="form-check">
					        <label class="form-check-label" for="checkbox104">Verifyed by Verifier
					        <input type="checkbox" name="verify_list[]" class="form-check-input" id="checkbox104"
                  <?php if ($row['status'] >=1 ) {
                    echo "checked";
                  } ?> <?php if ($row['status'] != 0 || $role != 1){
                    echo "disabled";
                  } ?> ></label>
					    </div>

					    <div class="form-check">
					        <label class="form-check-label" for="checkbox105">Verifyed by Branch Officer
					        <input type="checkbox" name="verify_list[]" class="filled-in form-check-input" id="checkbox105"
                  <?php if ($row['status'] >=2 ) {
                    echo "checked";
                  } ?> <?php if ($row['status'] != 1 || $role != 2){
                    echo "disabled";
                  } ?> ></label>
					    </div>

					    <div class="form-check">
					        <label class="form-check-label" for="checkbox106">Verifyed by Head Officer
					        <input type="checkbox" name="verify_list[]" class="form-check-input" id="checkbox106"
                  <?php if ($row['status'] >=3 ) {
                    echo "checked";
                  } ?> <?php if ($row['status'] != 2 || $role != 3){
                    echo "disabled";
                  } ?> ></label>
					    </div>
					    <hr>
					    <div class="for-group">
					    	<input type="submit" class="btn btn-primary btn-sm" value="Verify" 
                <?php if ($row['status'] >=3 ) echo "disabled"; ?>
                
                 <?php if ($row['status'] > 0 && $role == 1){
                    echo "disabled";
                  } ?>
                  

                  <?php if ($row['status'] != 1 && $role == 2){
                    echo "disabled";
                  } ?> 

                  <?php if ($row['status'] != 2 && $role == 3){
                    echo "disabled";
                  } ?>
                >
					    </div>
						
					</form>
                </div>
              </div>
            </div>
		</div>

<?php
include_once "inc/footer.php";
?>