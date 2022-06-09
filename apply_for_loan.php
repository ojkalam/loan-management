<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>

       <script>
        function calculateEMI() {
            var loan_amount =document.myform.loan_amount.value;
            if (!loan_amount)
                loan_amount = '0';

            var loan_percent = document.myform.loan_percent.value;
            if (!loan_percent)
                loan_percent = '0';

             var installments = document.myform.installments.value;
            if (!installments)
                installments = '0';


            var loan_amount = parseFloat(loan_amount);
            var loan_percent = parseFloat(loan_percent);
            var installments = parseFloat(installments);

            var total = loan_amount+(loan_amount*(loan_percent/100));

            document.myform.total_amount.value = parseFloat(total).toFixed(2);
            document.myform.borrower_emi.value = parseFloat((total/installments)).toFixed(2);
        }
      </script>


  <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_loan_application'])) {
        $inserted = $ml->applyForLoan($_POST,$_FILES);
        }
   ?>
        <h3 class="page-heading mb-4">Loan application form</h3>
        <h5 class="card-title p-3 bg-info text-white rounded">Fill up loan details</h5>
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
           $name ="" ; $b_id = "";
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
             
                $nid = $_POST['key'];
                $br = $emp->findBorrower($nid);
                if ($br) {
                    $row = $br->fetch_assoc();
                    $name = $row['name'];
                    $b_id = $row['id'];
                  }else{
                    echo "<span class='text-center' style='color:red'>Borrower NID not martched or not applicable for loan</span>";
                  }
              }            
           ?>

          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
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

          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" name="myform" id="myform" >
            </div>
<!--Added Borrower Name-->
            <div class="form-group row">
              <label for="borrower_name" class="text-right col-2 font-weight-bold col-form-label">Borrower Name</label>                      
              <div class="col-sm-9">
                  <input type="text"  name="borrower_name" class="form-control" value="<?php echo $name; ?>" readonly>
              </div>
            </div>

            <!--Added Borrower ID-->
            <div class="form-group row">
              <label for="borrower_id" class="text-right col-2 font-weight-bold col-form-label">Borrower ID</label>                      
              <div class="col-sm-9">
                  <input type="text"  name="b_id" class="form-control" value="<?php echo $b_id; ?>" readonly>
              </div>
            </div>

           

            <div class="form-group row">
              <label for="loanamount" class="text-right col-2 font-weight-bold col-form-label">Expected Loan amount</label>                      
              <div class="col-sm-9">
                  <input type="number"  onkeyup="calculateEMI()" name="loan_amount" class="form-control" id="loanamount" placeholder="Enter expected loan" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="loanpercentage" class="text-right col-2 font-weight-bold col-form-label">Loan Percentage</label>                      
              <div class="col-sm-9">
                  <input type="number" onkeyup="calculateEMI()" name="loan_percent" class="form-control" id="loanpercentage" placeholder="Enter loan percent" required>
              </div>
            </div>

            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Set number of installments</label>                      
                 <div class="col-sm-9">
                  <input type="number" onkeyup="calculateEMI()" name="installments" class="form-control"  placeholder="Enter installments number" required>
              </div>
            </div> 
            
             <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Total amount including interest</label>                      
                 <div class="col-sm-9">
                  <input type="text"  name="total_amount" class="form-control" readonly required>
              </div>
            </div> 

            <div class="form-group row">
                <label for="inputBorrowerMobile" class="text-right col-2 font-weight-bold col-form-label">Automated calculated EMI</label>  
                <div class="col-sm-9">
                    <input type="text" name="borrower_emi" class="form-control positive-integer" id="inputBorrowerMobile" readonly required>
                </div>
            </div>

          <hr>
          <div class="form-group row">
              <label for="borrower_files" class="text-right font-weight-bold col-2 col-form-label">Borrower Files<br>(doc, docx, and pdf only)</label>
              <div class="col-sm-9">    
                  <input type="file"  name="borrower_files" required>
              </div>
          </div>
             <hr>
          <div class="form-group row">
              <div class="col-md-6">
              <input type="submit" name="submit_loan_application" class="btn btn-info pull-right" value="Submit Application">
              </div>
          </div><!-- /.box-footer -->    
        </form>
       </div>       

     
<?php
include_once "inc/footer.php";
?>