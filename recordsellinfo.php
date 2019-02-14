<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>


  <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['property_sell_submit'])) {
            
            $inserted = $ml->propertySellDetails($_POST);
            
        }
   ?>
        <h3 class="page-heading mb-4">Manage Liability</h3>
        <h5 class="card-title p-3 bg-info text-white rounded">property selling details</h5>
        <div class="container">
          <?php
              if (isset($inserted)){
          ?>
          <div id="successMessage" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php  echo $inserted; ?>
         </div>

          <?php
            }
          ?> 


          <?php 

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                $nid = $_POST['key'];
                $br = $emp->findBorrower($nid);

                if ($br) {
                    $row = $br->fetch_assoc();
                    $name = $row['name'];
                    $b_id = $row['id'];
                    //var_dump($b_id);
                    $aploan = $ml->getApprovedLoan($b_id);
                    if ($aploan) {
                       $loan = $aploan->fetch_assoc();
                       //var_dump($loan);
                       // var_dump($loan['nid']);
                    }else{
                      echo "<span class='text-center' style='color:red'>Loan not approved!</span>";
                    }

                  }else{
                    echo "<span class='text-center' style='color:red'>Borrower NID not martched or not applicable for loan</span>";
                  }
              }            
           ?>

          <form action="" method="POST">
                <div class="form-group row">
              <label for="inputBorrowerFirstName" class="text-right col-2 font-weight-bold col-form-label">Search brrower: </label>                      
              <div class="col-sm-6">
                  <input type="text" name="key" class="form-control" id="inputBorrowerFirstName" placeholder="Enter NID number of borrower" required>
              </div>
              <div class="col-sm-3">
                <input type="submit" class="btn btn-info" name="search" value="Search">
              </div>  
            </div>

          </form>  
    
          <form action="" method="post" name="myform" id="myform" >

            <div class="form-group row">
              <label for="inputBorrowerFirstName" class="text-right col-2 font-weight-bold col-form-label">Full Name</label>                      
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputBorrowerFirstName" value="<?php if(isset($name)) echo $name; ?>" readonly>
                  <input type="hidden" name="b_id" value="<?php if(isset($b_id)) echo $b_id; ?>">
                  <input type="hidden" name="loan_id" value="<?php if(isset($loan['id']))  echo $loan['id']; ?>">
              </div>
            </div>

            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Total Amount to be paid:</label>
                 <div class="col-sm-9">
                  <input type="number"  class="form-control"   value="<?php if(isset($loan['total_loan'])) echo $loan['total_loan']; ?>" readonly>
              </div>
            </div> 
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Paid Amount</label>
                 <div class="col-sm-9">
                  <input type="number" name="amount_paid" class="form-control"  value="<?php if(isset($loan['amount_paid'])) echo $loan['amount_paid']; ?>" readonly>
              </div>
            </div> 

            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Amount Remaining</label>
                 <div class="col-sm-9">
                  <input type="number" class="form-control"  value="<?php if(isset($loan['amount_remain'])) echo $loan['amount_remain'] ; ?>" readonly>
                 </div>
            </div> 
            
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Property Name</label>
                 <div class="col-sm-9">
                  <input type="text" name="property_name" class="form-control"  placeholder="Property name" required>
                 </div>
            </div> 
              
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Property Details</label>
                 <div class="col-sm-9">
                 <textarea name="property_details" class="form-control" id="" cols="30" rows="10" required></textarea>
                 </div>
            </div> 
            

            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Selling price</label>
                 <div class="col-sm-9">
                  <input type="text" name="price" class="form-control"  placeholder="Property selling price" required>
                 </div>
            </div>
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Pay remaining loan</label>
                 <div class="col-sm-9">
                  <input type="number" name="pay_remaining_loan" class="form-control"  placeholder="Pay remaining loan" required>
                 </div>
            </div>  
             <hr>
          <div class="form-group row">
              <div class="col-md-6">
              <input type="submit" name="property_sell_submit" class="btn btn-info pull-right" value="Submit details">
              </div>
          </div><!-- /.box-footer -->    
        </form>
       </div>       

     
<?php
include_once "inc/footer.php";
?>