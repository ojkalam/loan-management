<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>

<div class="card">
  <div class="card-header">
    ALl loan Details
  </div>
  <div class="card-body">
    	<h5 class="card-title">Loan details</h5>
		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Nid</th>
	                <th>Total loan</th>
	                <th>Insts</th>
	                <th>EMI</th>
	                <th>Amount Paid</th>
	                <th>Remaining amount</th>
	                <th>Total Fine</th>
	                <th>Current inst.</th>
	                <th>Remaining inst.</th>
	                <th>Next pay date</th>
	                <th>Action</th>

	            </tr>
	        </thead>

	        <tbody>
	        	<?php 
	        		$all = $ml->viewLoanApplication();
	        		if ($all) {
	        			$i = 1;
	        			while ($row = $all->fetch_assoc()) {
	        				$i++;

	        	 ?>
	            <tr>
	                <td><?php echo $row['name']; ?></td>
	                <td><?php echo $row['nid']; ?></td>
	                <td><?php echo $row['total_loan']; ?> tk</td>
	                <td><?php echo $row['installments']; ?></td>
	                <td><?php echo $row['emi_loan']; ?> tk/month</td>
	                <td><?php echo $row['amount_paid']; ?> tk</td>
	                <td><?php echo $row['amount_remain']; ?> tk</td>
	                <td><?php //echo $row['fine']; ?> tk</td>
	                <td><?php echo $row['current_inst']; ?></td>
	                <td><?php echo $row['remain_inst']; ?></td>
	                <td><?php //echo $row['next_date']; ?></td>
	                <td><div><a class="btn btn-info" href="individual_loan.php?loan_id=<?php echo $row['id']; ?>&b_id=<?php echo $row['b_id'];?>">view</a></div></td>
					
	            </tr>
				<?php 
	        			}
	        		}
				 ?>
	        </tbody>
	    </table>
	  </div>
	</div>

<?php
include_once "inc/footer.php";
?>