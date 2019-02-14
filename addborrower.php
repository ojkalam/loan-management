<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>
  <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inserted = $emp->addBorrower($_POST,$_FILES);
        }
   ?>
        <h3 class="page-heading mb-4">Add Borrower</h3>
        <h5 class="card-title p-3 bg-info text-white rounded">Borrower Personal Details</h5>
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
          <form action="" method="post" enctype="multipart/form-data" id="add_borrower_form">

            <div class="form-group row">
              <label for="inputBorrowerFirstName" class="text-right col-2 font-weight-bold col-form-label">Full Name</label>                      
              <div class="col-sm-9">
                  <input type="text" name="borrower_name" class="form-control" id="inputBorrowerFirstName" placeholder="Enter First Name Only" value="">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputBorrowerUniqueNumber" class="text-right col-2 font-weight-bold col-form-label">National ID number</label>                      
              <div class="col-sm-9">
                  <input type="text" name="borrower_nid" class="form-control" id="inputBorrowerUniqueNumber" placeholder="Unique Number" value="">
                  <p class="text-muted">this id number must be unique otherwise you get error message</p>
              </div>
            </div>
            <div class="form-group row">
                <label for="inputBorrowerGender" class="text-right col-2 font-weight-bold col-form-label">Gender</label>                      
                <div class="col-sm-6">
                    <select class="form-control" name="borrower_gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div> 
            <div class="form-group row">
                <label for="inputBorrowerMobile" class="text-right col-2 font-weight-bold col-form-label">Mobile</label>  
                <div class="col-sm-9">
                    <input type="text" name="borrower_mobile" class="form-control positive-integer" id="inputBorrowerMobile" placeholder="Numbers Only" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputBorrowerEmail" class="text-right col-2 font-weight-bold col-form-label">Email</label>                      
                <div class="col-sm-9">
                    <input type="text" name="borrower_email" class="form-control" id="inputBorrowerEmail" placeholder="Email" value="">
                </div>
            </div>
            <div class="form-group row">
              <!-- list($day,$mon,$year) = explode('/', $launch_date);
$launch_date = "$year-$mon-$day"; -->
                <label for="inputBorrowerDob" class="text-right col-2 font-weight-bold col-form-label">Date of Birth</label>                      
                <div class="col-sm-6">
                    <input type="date" name="borrower_dob" class="form-control is-datepick" id="inputBorrowerDob" value="">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="inputBorrowerAddress" class="text-right font-weight-bold col-2 col-form-label">Address</label>                      
                <div class="col-sm-9">
                    <input type="text" name="borrower_address" class="form-control" id="inputBorrowerAddress" placeholder="Address" value="">
                </div>
            </div>

          <div class="form-group row">
              <label for="inputBorrowerEORS" class="text-right font-weight-bold col-2 col-form-label">Working Status</label>                      
              <div class="col-sm-4">
                  <select class="form-control" name="borrower_working_status" id="inputBorrowerEORS">
                      <option value="Employee">Employee</option>
                      <option value="Owner">Owner</option>
                      <option value="Student">Student</option>
                      <option value="Unemployed">Unemployed</option>
                      <option value="other">Other</option>
                  </select>
              </div>
          </div> 
          <hr>
          <div class="form-group row">
              
              <label for="user_picture" class="text-right font-weight-bold col-2 col-form-label">Borrower Photo</label>
              <div class="col-sm-9">    
                <input type="file" id="photo_file" name="image">
              </div>
          </div>
             <hr>
          <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait">Submit</button>
          </div><!-- /.box-footer -->    
        </form>
       </div>           
<?php
include_once "inc/footer.php";
?>