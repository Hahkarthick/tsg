<?php

include('bill_cont_datactrl.php');
	# code...
	$resultset="";
		$total_amt=$_REQUEST['total'];
		$sgst=$_REQUEST['sgst'];
		$cgst=$_REQUEST['cgst'];
		$tds=$_REQUEST['totalCol']*0.02;
		//echo $tds;
		if (!empty($total_amt)) {
		$resultset=addMaster($total_amt,$sgst,$cgst,$tds);
		
		global $bill;
		$bill=$resultset;
	}
		//echo $resultset;

//if ($resultset==true) {
	

	$form_inc=$_REQUEST['form_inc'];

	for ($i=1; $i <=$form_inc ; $i++) {
			# code...	
		if(isset($_REQUEST['sno_1'.$i]))
		$slno=$_REQUEST['sno_1'.$i];
		else
		$slno="";
			
		if(isset($_REQUEST['particular_'.$i]))
		$particular=$_REQUEST['particular_'.$i];
		else
		$particular="";

		if(isset($_REQUEST['weight_'.$i]))
		$weight=$_REQUEST['weight_'.$i];
		else
		$weight="";

		if(isset($_REQUEST['purity_'.$i]))
		$purity=$_REQUEST['purity_'.$i];
		else
		$purity="";

		if(isset($_REQUEST['netgms_'.$i]))
		$netgms=$_REQUEST['netgms_'.$i];
		else
		$netgms="";

		if(isset($_REQUEST['mcharge_'.$i]))
		$mcharge=$_REQUEST['mcharge_'.$i];
		else
		$mcharge="";

		if(isset($_REQUEST['amount_'.$i]))
		$amount=$_REQUEST['amount_'.$i];
		else
		$amount="";

		$statusCode="";
		if (empty($particular) && empty($weight) && empty($purity)&& empty($netgms)&& empty($mcharge) && empty($amount)){
			return false;
		}
		else
		{
		   // echo $bill;
		  
		$bResult=addoutflow($particular,$weight,$purity,$netgms,$bill);
		$cash=addoutcash($mcharge,$amount,$bill);
		}
	if($cash==false)
		{
			//echo "failure <br/>";
			echo false;
		}
		else
		{
			echo true;
		}	
	}	

		exit;
//}
?>
