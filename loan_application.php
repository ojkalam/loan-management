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
	                <th>DOB</th>
	                <th>ExpectedLoan</th>
	                <th>Percentage</th>
	                <th>Inst</th>
	                <th>TotalLoan</th>
	                <th>EMI</th>
	                <th>Documents</th>
	                <th>Report</th>
	                <th>Status</th>
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
	                <td><?php echo $row['dob']; ?></td>
	                <td><?php echo $row['expected_loan']; ?> tk</td>
	                <td><?php echo $row['loan_percentage']; ?>%</td>
	                <td><?php echo $row['installments']; ?></td>
	                <td><?php echo $row['total_loan']; ?> tk</td>
	                <td><?php echo $row['emi_loan']; ?> tk/month</td>
	                <td><a href="<?php echo $row['files'];?>">download</a></td>
	                <td><a target="_blank" href="loan_app_report.php?loan_id=<?php echo $row['id'];?>">report</a></td>
	                <td><?php if($row['status'] == 3){
	                			echo "<label class='badge badge-success'>Approved</label>";
	                			//echo "<a href='#' class='btn btn-outline-success btn-sm'>Pay Loan</a>";
	                		}else{
	                			echo "<label class='badge badge-warning'>Pending</label>";
	                		}

	                 ?></td>
					
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