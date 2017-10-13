<!DOCTYPE HTML>
<html>
<?php
	include 'common.php';
	externalLinks(); 
?>
<body>
	<script type="text/javascript">
      $('#print').on('click',function(){
         $('.outter-wp').printThis({
                 debug: false,           // show the iframe for debugging
                 importCSS: false,        // import parent page css
                 importStyle: true,     // import style tags
                 printContainer: true,   // print outer container/$.selector
                 loadCSS: ["{{asset('css/app.css')}}"],            // load an additional css file - load multiple stylesheets with an array []
                 header: "",
                         // "<h4 class='header col-md-12'>"+paymentType+"</h4>",           // prefix to html
                 pageTitle: "",          // add title to print page
                 removeInline: false,    // remove all inline styles
                 printDelay: 333,        // variable print delay
                 doctypeString: '<!DOCTYPE html>', // html doctype
                 removeScripts: false    // remove script tags before appending
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
					<div class="col-md-6 col-sm-6 col-xs-12 f_left">
						<h2>Sri Rak Jewelers</h2>
						<address>
							<span>678-680, Big Bazzar Street, Coimbatore - 01</span>
							<span>E- mail: dnbalaramkumar581979@gmail.com</span>
							<span>Cell: 91502 05732,98438 15732</span>
							<span>GST NO: 33AQFS5988RIZR</span>
							<span>HSN/SAC CODE:7113/998892</span>
						</address>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 f_right">
						<h3>LALITHA JEWELLERY MART PVT LTD</h3>
						<address>
							<span>Name & Address ……………………………………………………………………………………………………………..</span>
							<span>NO 53 ICON SAVITHRI GANESH BUILIDING ,HABIBULLAH ROAD,</span>
							<span>T NAGAR. CHENNAI -17</span>
							<span>GST NO: ……………………………………………………………………</span>
						</address>
					</div>					
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="table-responsive">          
						  	<table class="table">
								<thead>
								  <tr>
									<th>Sl No</th>
									<th>Paticulars</th>
									<th>Quantity</th>
									<th>Purity</th>
									<th>Net GMS</th>
									<th>M.Charge Amount</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>1</td>
									<td>Anna</td>
									<td>Pitt</td>
									<td>35</td>
									<td>New York</td>
									<td>USA</td>
								  </tr>
								  <tr>
									<td>1</td>
									<td>Anna</td>
									<td>Pitt</td>
									<td>35</td>
									<td>New York</td>
									<td>USA</td>
								  </tr>
								  <tr>
									<td>1</td>
									<td>Anna</td>
									<td>Pitt</td>
									<td>35</td>
									<td>New York</td>
									<td>USA</td>
								  </tr>
								</tbody>
						  	</table>
						  	<div class="total">
						  		<label>SGST:</label>
						  		<label>CGST:</label>
						  		<label>Total Amount</label>
						  	</div>
						</div>
						<button id="print">Print</button>
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