<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>

       <script>
        // function calculateEMI() {
        //     var loan_amount =document.myform.loan_amount.value;
        //     if (!loan_amount)
        //         loan_amount = '0';

        //     var loan_percent = document.myform.loan_percent.value;
        //     if (!loan_percent)
        //         loan_percent = '0';

        //      var installments = document.myform.installments.value;
        //     if (!installments)
        //         installments = '0';


        //     var loan_amount = parseFloat(loan_amount);
        //     var loan_percent = parseFloat(loan_percent);
        //     var installments = parseFloat(installments);

        //     var total = loan_amount+(loan_amount*(loan_percent/100));

        //     document.myform.total_amount.value = parseFloat(total).toFixed(2);
        //     document.myform.borrower_emi.value = parseFloat((total/installments)).toFixed(2);
        // }
      </script>


  <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment_submit'])) {
            
            $inserted = $ml->payLoan($_POST);
            
        }
   ?>
        <h3 class="page-heading mb-4">Loan Payment</h3>
        <h5 class="card-title p-3 bg-info text-white rounded">Payment</h5>
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
                    // $total_loan = $row['total_loan'];
                    // $amount_paid = $row['amount_paid'];
                    $aploan = $ml->getApprovedLoanNotPaid($b_id);
                    if ($aploan) {
                       $loan = $aploan->fetch_assoc();

                       $loan_id_r = $loan['id'];
                       //var_dump($loan);
                       // var_dump($loan['nid']);
                    }else{
                      echo "<span class='text-center' style='color:red'>Loan not approved or already Paid!</span>";
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
                  <input type="text" name="borrower_name" class="form-control" id="inputBorrowerFirstName" value="<?php if(isset($name)) echo $name; ?>" required readonly>
                  <input type="hidden" name="b_id" value="<?php if(isset($b_id)) echo $b_id; ?>">
                  <input type="hidden" name="loan_id" value="<?php if(isset($loan['id']))  echo $loan['id']; ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="loanamount" class="text-right col-2 font-weight-bold col-form-label">Payment amount(EMI)</label>                      
              <div class="col-sm-9">
                  <input type="number"  name="payment" class="form-control" id="loanamount" value="<?php if(isset($loan['emi_loan'])) echo $loan['emi_loan']; ?>" readonly>
              </div>
            </div>
            <?php if (isset($loan['next_date'])) {
              
              ?>
              <div class="form-group row">
              <label for="nextdate" class="text-right col-2 font-weight-bold col-form-label">Expected Last date of payment</label>                      
              <div class="col-sm-9">
                  <input type="date" class="form-control" id="nextdate" value="<?php echo $loan['next_date']; ?>" readonly>
              </div>
            </div>
      
              <div class="form-group row">
              <label for="nextdate" class="text-right col-2 font-weight-bold col-form-label">Next date of payment</label>                      
              <div class="col-sm-9">
                  <input type="date"  name="next_date" class="form-control" id="nextdate" value="<?php echo date('Y-m-d',strtotime('+30 days',strtotime($loan['next_date']))); ?>" readonly>
              </div>
            </div>
            
              <?php 
              $current_date = strtotime(date('d-m-Y'));       
              $last_date = strtotime($loan['next_date']);   
              if ($current_date > $last_date) {
              //echo "You have fine";
              ?>
                  <!-- fine claculation -->
               <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Fine Calculation(2% of EMI):</label>
                 <div class="col-sm-9">
                    <input type="number" name="fine_amount" class="form-control"  value="<?php 
                    //calculate fine
                    echo  $loan['emi_loan'] * (2/100);
                     ?>" readonly>
                  </div>
                </div> 


              <?php
                  }
                ?>
           
                    
          <?php  } ?>

            <div class="form-group row">
              <label for="loanpercentage" class="text-right col-2 font-weight-bold col-form-label">Select Payment Date</label>                      
              <div class="col-sm-9">
                  <input type="date"  name="pay_date" class="form-control" id="loanpercentage" required>
              </div>
            </div>
          
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Current Installment</label>
                 <div class="col-sm-9">
                  <input type="number" name="current_inst" class="form-control"   value="<?php if(isset($loan['current_inst'])) echo $loan['current_inst']+1; ?>" readonly>
              </div>
            </div> 
            
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Remaining Installment</label>
                 <div class="col-sm-9">
                  <input type="number" name="remain_inst" class="form-control"   value="<?php if(isset($loan['remain_inst'])) echo $loan['remain_inst'] - 1; ?>" readonly>
              </div>
            </div> 
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Total Amount to be paid:</label>
                 <div class="col-sm-9">
                  <input type="number"  name="total_amount" class="form-control"   value="<?php if(isset($loan['total_loan'])) echo $loan['total_loan']; ?>" readonly>
              </div>
            </div> 
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Paid Amount</label>
                 <div class="col-sm-9">
                  <input type="number" name="paid_amount" class="form-control"  value="<?php if(isset($loan['amount_paid'])) echo $loan['amount_paid']+$loan['emi_loan']; ?>" readonly>
              </div>
            </div> 
          
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Amount Remaining</label>
                 <div class="col-sm-9">
                  <input type="number" name="remain_amount" class="form-control"  value="<?php if(isset($loan['amount_remain'])) echo $loan['amount_remain']; ?>" readonly>
                 </div>
            </div> 

             <hr>
          <div class="form-group row">
              <div class="col-md-6">
              <input type="submit" name="payment_submit" class="btn btn-info pull-right" value="Submit Payment">
              </div>
          </div><!-- /.box-footer -->    
        </form>
       </div>       

     
<?php
include_once "inc/footer.php";
?>