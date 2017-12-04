<?php

include('conf/dbfunctions.php');


function addMaster($total_amt,$sgst,$cgst,$tds){
	$sql="INSERT INTO transaction_master(`net_amount`,`SGST`,`CGST`,`TDS`) VALUES "
	." (:total_amt,:sgst,:cgst,:tds)";
       $valueArray=array(
       		  ':total_amt'=>$total_amt,
       		  ':sgst'=>$sgst,
       		  ':cgst'=>$cgst,
       		  ':tds'=>$tds
       		       );

       $userid1=dbInsert($sql, $valueArray,true);
		$_SESSION['userId']=$userid1;
}

function addoutflow($particular,$weight,$purity,$netgms,$bill)
{
	$sql="INSERT INTO gold_outflow(`particular`, `weight`, `purity`, `net_gms`, `bill_no`) VALUES "
	." (:particular,:weight,:purity,:netgms,:billno)";
       $valueArray=array(
       		  ':particular'=>$particular,
       		  ':weight'=>$weight,
       		  ':purity'=>$purity,
       		  ':netgms'=>$netgms,
			  ':billno'=>$bill
       		       );

    $outflow=dbInsert($sql, $valueArray,true);

	if($outflow){
		echo true;
	}else{
		echo false;
	}
}

function addoutcash($making_charge,$amount,$bill)
{
	$sql="INSERT INTO cash_outflow(`bill_no`, `making_charge`, `amount`) VALUES "
	." (:bill_no,:making_charge,:amount)";

	 $valueArray=array(
       		  ':making_charge'=>$making_charge,
       		  ':amount'=>$amount,
			  ':bill_no'=>$bill
       		       );

    $outflow=dbInsert($sql, $valueArray,true);

	if($outflow){
		echo true;
	}else{
		echo false;
	}
}

?>
