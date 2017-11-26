<?php
session_start();

include ('security.php');
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

	
	
	if($userid1){
		echo true;	
	}else{
		echo false;
	}
}

?>
