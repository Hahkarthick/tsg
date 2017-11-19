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
	<div class="set-1">
																			<div class="graph-2 general">
																				<h3 class="inner-tittle two">General Form  </h3>
																					<div class="grid-1">
																							<div class="form-body">
																									<form class="form-horizontal">
																										<div class="form-group">
																											<label for="focusedinput" class="col-sm-2 control-label">Company Name</label>
																											<div class="col-sm-8">
																												<input type="text" class="form-control1" id="focusedinput">
																											</div>
																										</div>
																										
																										<div class="form-group">
																											<label for="txtarea1" class="col-sm-2 control-label">Address</label>
																											<div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
																										</div>
																										<div class="form-group">
																											<label for="mobile" class="col-sm-2 control-label">Mobile</label>
																											<div class="col-sm-8">
																												<input type="text" class="form-control1" id="mobile">
																											</div>
																										</div>
																										<div class="form-group">
																											<label for="pincode" class="col-sm-2 control-label label-input-sm">Pincode</label>
																											<div class="col-sm-8">
																												<input type="text" class="form-control1 input-sm" id="pincode">
																											</div>
																										</div>
																										<div class="form-group">
																											<label for="gst" class="col-sm-2 control-label">GST Number</label>
																											<div class="col-sm-8">
																												<input type="text" class="form-control1" id="gst">
																											</div>
																										</div>
																										<div class="form-group mb-n">
																											<label for="emailid" class="col-sm-2 control-label label-input-lg">Email-id</label>
																											<div class="col-sm-8">
																												<input type="text" class="form-control1 input-lg" id="emailid">
																											</div>
																										</div>
																										<div class="form-group">
																											<button type="submit" class="btn btn-default">Submit</button>
																										</div>
																									</form>
																							</div>

																					</div>
																				</div>
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

