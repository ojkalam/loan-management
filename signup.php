<?php
include_once "classes/Employee.php";
$emp = new Employee();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

  <body>
    <?php 
        if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
          $inserted = $emp->employeeReg($_POST);
        } 
    ?>
    <form class="form-signin" action="" method="POST">
      <div class="text-center mb-4">
        <img class="" src="images/brac.jpg" alt="" width="220" height="72">
      </div>
      <div class="text-center mb-4"><?php 
          if (isset($inserted)) {
            echo $inserted."";
          }
      ?></div>
      <div class="form-label-group">
        <input type="text" id="inputName" class="form-control" name="name" placeholder="Full Name" required autofocus>
        <label for="inputName">Full Name</label>
      </div>
      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>
      
      <div class="form-label-group">
        <select class="custom-select d-block w-100" name="role" required>
          <option selected>Select Designation...</option>
          <option value="1">Varifier</option>
          <option value="2">Branch Officer</option>
          <option value="3">Head Officer</option>
        </select>
      </div>

      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Register">
      <p class="mt-3 text-uppercase font-weight-bold text-center">Already registered ? <a href="signin.php">Sign in</a>.</p>

      <p class="mt-5 mb-3 text-muted text-center">Developed by &copy; Team: Lumen - 2018 </p>
    </form>
  </body>
</html>
