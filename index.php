<!DOCTYPE HTML>
<html>
<?php
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
						<h3>LALITHA JEWELLERY MART PVT LTD</h3>
						<address>
							<span>NO 53 ICON SAVITHRI GANESH BUILIDING ,HABIBULLAH ROAD,</span>
							<span>T NAGAR. CHENNAI -17</span>
							<span>GST NO: ……………………………………………………………………</span>
						</address>
					</div>					
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="table-responsive">          
						  	<table class="table table-bordered">
								<thead>
								  <tr>
									<th>Sl No</th>
									<th>Paticulars</th>
									<th>Weight</th>
									<th>Purity</th>
									<th>Net GMS</th>
									<th>M.Charge </th>
									<th>Amount</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td class="sm_table"><input type="text"></td>
									<td><input type="text"></td>
									<td class="sm_table"><input class="weight" type="text"></td>
									<td><input class="purity" type="text"></td>
									<td><input class="netGms" type="text"></td>
									<td><input class="mCharge" type="text"></td>
									<td><input class="amount" type="text"></td>
								  </tr>
								  <tr>
									<td class="sm_table"><input type="text"></td>
									<td><input type="text"></td>
									<td class="sm_table"><input type="text"></td>
									<td><input type="text"></td>
									<td><input type="text"></td>
									<td><input type="text"></td>
									<td><input type="text"></td>
								  </tr>
								  <tr>
									<td class="sm_table"><input type="text"></td>
									<td><input type="text"></td>
									<td class="sm_table"><input type="text"></td>
									<td><input type="text"></td>
									<td><input type="text"></td>
									<td><input type="text"></td>
									<td><input type="text"></td>
								  </tr>
								</tbody>
						  	</table>
						  	<div class="total col-md-12">
						  		<div class="">
							  		<p>SGST:2.5%</p>
							  		<p>CGST:2.5%</p>
							  		<p>Total:</p>
						  		</div>
						  	</div>
						</div>						
					</div>
				</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
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