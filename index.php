<!DOCTYPE HTML>
<html>
<?php
include ('conf/dbfunctions.php');
	include 'common.php';
	externalLinks();
?>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
	      $('#print').on('click',function(){
	         $('#printCont').printThis({
	                 debug: true,           // show the iframe for debugging
	                 importCSS: false,        // import parent page css
	                 importStyle: true,     // import style tags
	                 printContainer: true,   // print outer container/$.selector
	                 loadCSS: ["tsg/css/custom.css","tsg/css/style.css","tsg/css/bootstrap.min.css"],            // load an additional css file - load multiple stylesheets with an array []
	                 header: "",
	                         // "<h4 class='header col-md-12'>"+paymentType+"</h4>",           // prefix to html
	                 footer:"<h4 class='f_right'>For<b>SRI RAK JEWELLERS</h4><br>"+
	                 			"<p class='f_left'>Smith Signature</p>"+
	                 			"<p class='f_right'>Partner</p>",
	                 pageTitle: "",          // add title to print page
	                 removeInline: false,    // remove all inline styles
	                 printDelay: 333,        // variable print delay
	                 doctypeString: '<!DOCTYPE html>', // html doctype
	                 removeScripts: false    // remove script tags before appending
	         });
	    	});
				$('#proceed').on('click',function(){
						var total=$('.sumTotal span').html();
						var sgst=$('.sgst span').html();
						var cgst=$('.cgst span').html();
						var totalCol=$('.totalCol span').html();
						//alert(total);
						$.ajax({
						type: "POST",
						url: "bill_cont.php",
						data:$('form').serialize()+"&total="+total+"&sgst="+sgst+"&cgst="+cgst+"&totalCol="+totalCol,
						success: function(results) {
							if (results==1) {
								$("#result").html("Registered Successfully");
								$('#result')[0].scrollIntoView(true);
								$("#result").addClass("alert alert-success");
								$('.print').show() && $('#proceed').hide();
									 print();
							}else{
								$('#error').html(results);
								$('#error')[0].scrollIntoView(true);
								$('#error').addClass("alert alert-danger");
								}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
						 $('.result').text(textStatus,errorThrown);
													$('#error').html(textStatus,errorThrown);
													$('#error')[0].scrollIntoView(true);
													$('#error').addClass("alert alert-danger");
						}
						});
			});

				$('.company').on('change',function(){
						var companyId=$(this).val();
						$.getJSON({
								type: "POST",
								url: "compDetailsCont.php",
								data: "&compId=" + companyId,
								success: function(results) {
										var count=Object.keys(results.result[0].comp).length;
										if (count>0) {
											$('.address').html("<b>Address:</b>"+results.result[0].comp[0]['address']);
											$('.mobile').html("<b>Mobile-No:</b>"+results.result[0].comp[0]['mobile']);
											$('.gst').html("<b>Gst-No:</b>"+results.result[0].comp[0]['gst']);
											$('.mail_id').html("<b>Email-Id:</b>"+results.result[0].comp[0]['emailid']);
										};
								},
								error: function(XMLHttpRequest, textStatus, errorThrown) {
										$('#error').html(textStatus,errorThrown);
										$('#error').addClass("alert alert-danger");
								}
						});
				});
    	});
	</script>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<?php
			headerBar();
		?>
			<div class="outter-wp">
				<!-- Main Container -->
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
						<p>No:</p>
						<p>Date:</p>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 border">
						<span class="col-md-4 col-sm-4 col-xs-12">Tin No:33776262182</span>
						<span class="col-md-4 col-sm-4 col-xs-12">CST NO:265634</span>
						<span class="col-md-4 col-sm-4 col-xs-12">Date:</span>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<select data-toggle="tooltip" data-placement="top" title="Select Company" class="company">
								<option value="none">Select Company</option>
									<?php
											$sql="SELECT `id`,`name`	 FROM `company`";
											$value=array();
											$row=dbSelectRows($sql,$value);
											for ($i=0; $i<count($row) ; $i++) {
									?>
										<option value="<?php echo $row[$i]['id']?>"><?php echo $row[$i]['name'] ?></option>
									<?php }
									?>
						</select>
						<address>
							<span class="address"></span>
							<span class="mobile"></span>
							<span class="gst"></span>
							<span class="mail_id"></span>
						</address>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div>
								<span id="result" class="col-md-12 col-sm-12 col-xs-12"></span>
								<span id="error" class="col-md-12 col-sm-12 col-xs-12"></span>
						</div>
						<div class="table table-responsive">
							<form method="POST">
								<input type="hidden" id="form_inc" value="1" name="form_inc">								
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
						<button class="btn btn-info " id="print">Print</button>
					</div>

				<!-- //Main Container -->
			</div>
			 <!--footer section start-->
				<?php
					footer();
				?>
			<!--footer section end-->
		</div>
	</div>
				<!--//content-inner-->
							<?php
								sideBar();
							?>
							  <div class="clearfix"></div>
							</div>
							<script>
							var toggle = true;

							$(".sidebar-icon").click(function() {
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }

											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
