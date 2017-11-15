<?php
include_once('dbconfig.php');
include_once('auditlog.php');

function dbInsert($sql, $valueArray, $getInsertID=false)
{

	//debug(" dbInsert entry");

	$db = Database::getInstance()->getConnection();
	$query = $db->prepare($sql);
	$query->execute($valueArray);

	//debug(" dbInsert exit");

	if($getInsertID){
		//debug(" dbInsert returns last ");
		$lastInsertId=$db->lastInsertId();
		//debug (" ID :: " . $lastInsertId);
		return $lastInsertId; 
	}
}


function dbUpdate($sql, $valueArray, $auditLog=false)
{
	//debug(" dbUpdate entry");
	
	if($auditLog===true) {
		auditLog($sql, $valueArray, $_SESSION["username"]);
	}
	
	$db = Database::getInstance()->getConnection();
	$query = $db->prepare($sql);
	if($query->execute($valueArray)){
		return $query->rowCount();			
	}
	else
	{
		return false;
	}

	//return $rowsAffected;
}

function reverse_date_format($pstr)
{
	$pstr=trim($pstr);
	$darr=explode("-",$pstr);
	return $darr[2]. "-" .$darr[1]. "-" . $darr[0];
}

function dbSelectRowAsJSON($sql,$valueArray){
	$row = dbSelectRow($sql,$valueArray);
	return json_encode($row);
}

function dbSelectRow($sql,$valueArray){
	$db = Database::getInstance()->getConnection();
	$pstmt=$db->prepare($sql);
	$pstmt->execute($valueArray);
	$pstmt->setFetchMode(PDO::FETCH_ASSOC);
	$row = $pstmt->fetch();
	return $row;
}


function dbSelectRowsAsJSON($sql,$valueArray){
	$rows = dbSelectRows($sql,$valueArray);
	return json_encode($rows);
}

function dbSelectRows($sql,$valueArray){
	$db = Database::getInstance()->getConnection();
	$pstmt=$db->prepare($sql);
	$pstmt->execute($valueArray);
	$pstmt->setFetchMode(PDO::FETCH_ASSOC);
	$rows = $pstmt->fetchAll();
	return $rows;
}


function dbSelectRowsIndexed($sql,$valueArray){
	$db = Database::getInstance()->getConnection();
	$pstmt=$db->prepare($sql);
	$pstmt->execute($valueArray);
	$pstmt->setFetchMode(PDO::FETCH_NUM);
	$rows = $pstmt->fetchAll();
	return $rows;
}


function getRecordCountTable($tableName,$condition){
	$sql="SELECT COUNT(*) AS RecordCount FROM $tableName $condition";
	$valueArray=array();
	
	$db = Database::getInstance()->getConnection();
	$pstmt=$db->prepare($sql);
	$pstmt->execute($valueArray);
	$pstmt->setFetchMode(PDO::FETCH_ASSOC);
	$row = $pstmt->fetch();
	return $row["RecordCount"];
}

function getCSV($rows){
	//no records from DB
	if(empty($rows)){
	   return "No records for this category";
	}
	//if records returned from DB
	$uniqueIds = array_keys($rows[0]);
	$header=implode(",", $uniqueIds); 	
	$fileContent = $header. "\r\n";
	foreach($rows as $row){
		$fileContent .=  implode(",", $row) . "\r\n";
	}
	return $fileContent;
}

function writeCSV($filename, $csvdata){
	$fp = fopen($filename, 'w');
	fwrite($fp, $csvdata);
	fclose($fp);
}
function reverse_date($pstr)
{
	$pstr=trim($pstr);
	$darr=explode("/",$pstr);
	return $darr[2]. "/" .$darr[1]. "/" . $darr[0]; 
}
function reverse_date_edit($pstr)
{
	$pstr=trim($pstr);
	$darr=explode("-",$pstr);
	return $darr[2]. "/" .$darr[1]. "/" . $darr[0];
}
function reverse_edit($pstr)
{
	$pstr=trim($pstr);
	$darr=explode("/",$pstr);
	return $darr[2]. "/" .$darr[1]. "/" . $darr[0];
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
} 
function moneyFormatIndia($num){
        $nums = explode(".",$num);
        if(count($nums)>2){
            return "0";
        }else{
        if(count($nums)==1){
            $nums[1]="00";
        }
        $num = $nums[0];
        $explrestunits = "" ;
        if(strlen($num)>3){
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); 
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; 
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++){

                if($i==0)
                {
                    $explrestunits .= (int)$expunit[$i].","; 
                }else{
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash.".".$nums[1]; 
        }
    }
?>
