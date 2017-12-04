<?PHP
session_start();
  include 'common.php';
  include ('conf/dbfunctions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tsg</title>
    <?php
    	externalLinks()
    ?>
  </head>
  <body>
    <div class="container">
      <div class="printcont col-md-12 col-sm-12">
        <div id="printCont" class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-8 col-sm-8 col-xs-8 f_left from">
						<h2>SRI RAK JEWELLERS</h2>
						<address>
							<span>678-680, Big Bazzar Street, Coimbatore - 01</span>
							<span>E- mail: dnbalaramkumar581979@gmail.com</span>
							<span>Cell: 91502 05732,98438 15732</span>
						</address>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 f_right to">
						<h2>Smith Issue</h2>
							<?php
							$sql="SELECT `id` FROM `transaction_master` ORDER BY  `id` DESC LIMIT 1";
							$value=array();
							$bill_no=dbSelectRow($sql,$value);
							$index= ++$bill_no['id']
							?>
							<p>Bill No:&nbsp;&nbsp;<label> <?php echo $index ?></label></p>
						<p>Date:</p>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 border">
						<span class="col-md-4 col-sm-4 col-xs-12">Tin No:33776262182</span>
						<span class="col-md-4 col-sm-4 col-xs-12">CST NO:265634</span>
						<span class="col-md-4 col-sm-4 col-xs-12">Date:</span>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
									<?php
                      $id=$_SESSION['userId'];
											$sql="SELECT `id`, `name`, `address`, `mobile`, `pincode`, `gst`, `emailid` FROM `company` WHERE `id`=:userid";
											$value=array(
                          ':userid'=>$id
                      );
											$row=dbSelectRows($sql,$value);

									?>
						<address>
              <span class="compName"><?php echo $row['name'] ?></span>
							<span class="address"><?php echo $row['address'] ?><?php echo $row['pincode'] ?></span>
							<span class="mobile"><?php echo $row['mobile'] ?></span>
							<span class="gst"><?php echo $row['gst'] ?></span>
							<span class="mail_id"><?php echo $row['emailid'] ?></span>
						</address>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div>
								<span id="result" class="col-md-12 col-sm-12 col-xs-12"></span>
								<span id="error" class="col-md-12 col-sm-12 col-xs-12"></span>
						</div>
						<div class="table table-responsive">
							<input type="hidden" id="form_inc" value="1" name="form_inc">
							<form method="POST">
							  	<table data-id="1" id="usertbl" class="table table-bordered">
									<thead>
									  <tr>
										<th>Sl No</th>
										<th>Paticulars</th>
										<th>Weight</th>
										<th>Purity</th>
										<th>Net GMS</th>
										<th>M.Charge </th>
										<th>Amount</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="particular_list" data-id="1" id='rec_1'>
										<td class="sm_table"><input type="text" name="sno_1" value="1"></td>
										<td><input type="text" value="" name="particular_1"></td>
										<td class="sm_table"><input class="weight" name="weight_1" type="text" value=""></td>
										<td><input class="purity" value="" name="purity_1" type="text"></td>
										<td><input class="netGms" value="" name="netgms_1" type="text"></td>
										<td><input class="mCharge" value="" name="mcharge_1" type="text"></td>
										<td><input class="amount next_row" data-id="1" name="amount_1" value="" type="text"></td>
		               	<td class="action">
		               		<div>
		                  	<span data-id="1" class="fa fa-plus trigAddRow" aria-hidden="true"></span>
		                    <span data-id="rec_1" class=" delete_row glyphicon glyphicon-remove"></span>
		                    </div>
		                </td>
									  </tr>
									</tbody>
							  	</table>
						  	</form>
						  	<div class="total col-md-12">
						  		<div class="">
						  			<p class="totalCol">Net Amount:<span></span></p>
							  		<p data-value="2.5" class="sgst">SGST 2.5%:<span></span></p>
							  		<p data-value="2.5" class="cgst">CGST 2.5%:<span></span></p>
							  		<p class="sumTotal">Total:<span></span><p>
						  		</div>
						  	</div>
						</div>
					</div>
				</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<button type="hidden" data-id="1" id="new_row" class="btn btn-warning">Add</button>
						<button type="button" id="proceed" class="btn btn-success">Submit</button>
						<button class="btn btn-info print " id="print">Print</button>
					</div>
      </div>
    </div>
  </body>
</html>
