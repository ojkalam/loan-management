<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>

<div class="card">
  <div class="card-header">
    ALl loan Application
  </div>
  <div class="card-body">
    	<h5 class="card-title">Loan details</h5>
		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Nid</th>
	                <th>Mobile</th>
	                <th>Expected Loan</th>
	                <th>Percentage</th>
	                <th>Installments</th>
	                <th>Total Loan</th>
	                <th>EMI</th>
	                <th>Documents</th>
	                <th>Verification</th>
	            </tr>
	        </thead>

	        <tbody>
	        	<?php 
	        		$all = $ml->viewLoanApplicationNotVerified();
	        		if ($all) {
	        			$i = 1;
	        			while ($row = $all->fetch_assoc()) {
	        				$i++;

	        	 ?>
	            <tr>
	                <td><?php echo $row['name']; ?></td>
	                <td><?php echo $row['nid']; ?></td>
	                <td><?php echo $row['mobile']; ?></td>
	                <td><?php echo $row['expected_loan']; ?> tk</td>
	                <td><?php echo $row['loan_percentage']; ?>%</td>
	                <td><?php echo $row['installments']; ?></td>
	                <td><?php echo $row['total_loan']; ?> tk</td>
	                <td><?php echo $row['emi_loan']; ?> tk/month</td>
	                <td><a href="<?php echo $row['files'];?>">download</a></td>
	                <td><a href="individual_verify.php?loan_id=<?php echo $row['id'];?>" class='btn btn-outline-success btn-sm'>Verify Loan</a></td>
					
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