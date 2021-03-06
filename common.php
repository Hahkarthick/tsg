<?php

	function externalLinks(){
?>
	<head>
	<title>SRI RAK Jewelers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Jewelers,gold,Rak,Sri rak Jewelers" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	 <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/custom.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/amcharts.js"></script>	
	<script src="js/serial.js"></script>	
	<script src="js/light.js"></script>	
	<script src="js/radar.js"></script>	
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/custom.js"></script>	
	<!-- <link href="css/barChart.css" rel='stylesheet' type='text/css' /> -->
	<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>

	<!-- Print js -->
	<script src="js/printThis.js"></script>	
	

	<!-- <script src="js/jquery.easydropdown.js"></script> -->

	<!--//skycons-icons-->
	</head>
<?php
	}
	function headerBar(){
?>
			<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
				<div class="top_menu">
					<h1 class="title text-center">SRI RAK JEWELERS</h1>
					<div class="clearfix"></div>	
							<!--//profile_details-->
				</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
			</div>
					<!-- //header-ends -->
<?php
	}
	function sideBar(){
?>
				<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1></h1></span> 
						<!--<img id="logo" src="" alt="Logo"/>--> 
					  </a> 
					</header>
					<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <a href="index.html"><img src="images/admin.png"></a>
									  <a href="index.html"><span class=" name-caret">SRI RAK</span></a>
									<ul>
									<li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" href="index.html"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
										<li><a class="tooltips" href="index.html"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <div class="menu">
									<ul id="menu" >
										 <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Smith Bill</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="issue_bill.php">Issue Local</a></li>
										    <li id="menu-academico-boletim" ><a href="issue_state.php">Issue Other State</a></li>
									   	    <li id="menu-academico-avaliacoes" ><a href="receipt_local.php">Receipt Local</a></li>
										    <li id="menu-academico-boletim" ><a href="receipt_non_gst.php">Receipt Non-GST</a></li>
									
										  </ul>
										</li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Sales Bill</span> <span class="fa fa-angle-right" style="float: right"></span></a>
											 <ul id="menu-academico-sub" >
												<li id="menu-academico-avaliacoes" ><a href="sales_local.php">Local Bill</a></li>
												<li id="menu-academico-boletim" ><a href="sales_state.php">Other State Bill</a></li>
											  </ul>
										 </li>
									<li id="menu-academico" ><a href="#"><i class="lnr lnr-book"></i> <span>Purchase Bill</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										  <ul id="menu-academico-sub" >
										    <li id="menu-academico-avaliacoes" ><a href="purchase_local.php">Local Bill</a></li>
										    <li id="menu-academico-boletim" ><a href="purchase_state.php">Other State Bill</a></li>
										  </ul>
									 </li>
									 <li><a href="gold_issue_bill.php"><i class="lnr lnr-layers"></i> <span>Gold Issue Bill</span></a></li>									
									 <li id="menu-academico" ><a href="#"><i class="lnr lnr-map"></i> <span>Cash Bill</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										  <ul id="menu-academico-sub" >
										    <li id="menu-academico-avaliacoes" ><a href="cash_receipt.php">Cash Receipt</a></li>
										    <li id="menu-academico-boletim" ><a href="cash_issue.php">Cash Issue</a></li>
										  </ul>
									 </li>
									 <li id="menu-academico" ><a href="#"><i class="lnr lnr-chart-bars"></i> <span>Registration</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										  <ul id="menu-academico-sub" >
										    <li id="menu-academico-avaliacoes" ><a href="registration.php">Company Registration</a></li>
										    <li id="menu-academico-boletim" ><a href="hsn_code.php">HSN Code</a></li>
										  </ul>
									 </li>
									  <li><a href="reports.php"><i class="lnr lnr-pencil"></i> <span>Reports</span></a></li>									
								  </ul>
								</div>
							  </div>
<?php
	}
	function footer(){
?>
		<footer>
		   <p>&copy 2017 . All Rights Reserved</p>
		</footer>
<?php 
	}
?>

