<?php
session_start();

include ('security.php');

	# code...

		$visit_date=$_REQUEST['visit_date'];
		$doctor_id=$_REQUEST['doctor_id'];
		$patient_id=$_SESSION['userinfo'];
		$statusCode="";
	if (!empty($visit_date) && !empty($doctor_id) && !empty($patient_id)) {

		$prescription_id=addMedic1(reverse_date($visit_date),$doctor_id,$patient_id);
	}
if ($prescription_id==true) {


	$form_inc=$_REQUEST['form_inc'];
	 // echo "$form_inc";
	for ($i=1; $i <=$form_inc ; $i++) {
			# code...
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
		$bResult=addBill($particular,$weight,$purity,$netgms,$mcharge,$amount);

		if($bResult==false)
		{
			//echo "failure <br/>";
			echo false;
		}
		else
		{
			echo true;

		}

		exit;
	}
}





?>
