<?php
session_start();
include ('conf/dbfunctions.php');

$compId=$_REQUEST['compId'];
// echo "$reverse_date";

  $sql="SELECT `id`, `name`, `address`, `mobile`, `pincode`, `gst`, `emailid` FROM `company` WHERE `id`=:cid";

    $value=array(
      ':cid'=>$compId
      );
    $comp=dbSelectRowsAsJSON($sql,$value);


    echo "{ \"result\" : [{ \"comp\" : " . $comp ."}]}";

    exit;
?>
