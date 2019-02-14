<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";

    if (isset($_GET['loan_id']) && isset($_GET['b_id'])) {
        $loan_id = $_GET['loan_id'];
        $b_id = $_GET['b_id'];
    }
?>	
	<?php 
		$borrower = $emp->findBorrowerById($b_id);
		if ($borrower) {
			while ($row = $borrower->fetch_assoc()) {
	 ?>
	 <div class="list-group">
           <a class="list-group-item">Name: <?php echo $row['name']; ?></a>
           <a class="list-group-item">NID: <?php echo $row['nid']; ?></a>
           <a class="list-group-item">Date of birth: <?php echo $row['dob']; ?></a>
           <a class="list-group-item">Phone: <?php echo $row['mobile']; ?></a>
           <a class="list-group-item">Address: <?php echo $row['address']; ?></a>

       </div>
     <?php
      		}
		} 
	?>
		<hr>
		<div class="row">
			<a href="loan_status.php" class="btn btn-primary ml-4">Back to loan status</a>
		</div>
          <div class="card-body">
            <h5 class="card-title mb-4">Loan Payment history</h5>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Pay Date</th>
                  <th>Amount paid</th>
                  <th>Installment</th>
                  <th>Fine</th>
                  <th>Payment report</th>
                </tr>
              </thead>
              <tbody>
              	<?php 
              	$payment = $ml->findPayment($b_id, $loan_id);
              	$i=0;
              	$sum = 0;
              	$inst = 0;

   				if ($payment) {
					
					while ($pay = $payment->fetch_assoc()) {
					$i++;
					$sum =  $sum+$pay['pay_amount'];
					$inst =$inst+ $pay['current_inst'];
              	 ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $pay['pay_date']; ?></td>
                  <td><?php echo $pay['pay_amount']; ?></td>
                  <td><?php echo $pay['current_inst']; ?></td>
                  <td><?php echo $pay['fine']; ?></td>
                   <td><a target="_blank" href="payment_report.php?loan_id=<?php echo $pay['loan_id']; ?>&pay_id=<?php echo $pay['id']; ?>&b_id=<?php echo $pay['b_id']; ?>">report</a></td>
                </tr>
                     <?php
				      		}
						} 
					?>

				<tfoot>
                  <th>Total: <?php echo $i; ?></th>
                  <th></th>
                  <th>Total: <?php echo $sum; ?></th>
                  <th>Total Completed Installment: <?php echo $i; ?></th>
                </tfoot>
              </tbody>

            </table>
          </div>
        </div>
<?php
include_once "inc/footer.php";
?>