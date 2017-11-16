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
	
									   <div class="error_page">
												<!--/login-top-->
												
													<div class="error-top">
													
													    <div class="login">
														<h3 class="inner-tittle t-inner">HSN Code</h3>
																<form>
																		<input type="text" class="text" value="HSN Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" >
																		<input type="text" value="Value" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
																		<div class="sign-up">
																					<input type="submit" onclick="myFunction()" value="Register">
																			
																		</div>
																		<div class="clearfix"></div>
																		
																		</form>
														</div>
														
													</div>
													 </div>
												<!--//login-top-->
										 <!--footer section start-->
				<div class="footer">
										   <p>&copy 2017 All Rights Reserved</p>
										</div>
									
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
