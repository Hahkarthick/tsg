<?php
include('dbfunctions.php');

function updateUserStatus($activate,$status){
	$sql="update patient set status=:status where patient_id=:id";
	$valueArray=array(':status'=>$status,':id'=>$activate);
	$rowsAffected=dbUpdate($sql,$valueArray);
	return $rowsAffected;
}

function resetForgotPwd($user_email,$pwd){

	global $psalt;
	$pwd=$psalt.$pwd;
	$sql="update users set password=password(:resetPwd) where email=:email ";
	$valueArray=array(':email'=>$user_email,'resetPwd'=>$pwd);
	$rowsAffected=dbUpdate($sql, $valueArray);
	return $rowsAffected;
}


//get reset passwd token
function validateResetToken($user_email, $authtoken){
	$sql ="Select * from forgotpassword where user_email = :user_email "  .
			" and authtoken = :authtoken " .
			" and resetstatus ='pending' " .
			" and TIMESTAMPADD(MINUTE,resetmaxtime,dtstamp) >= CURRENT_TIMESTAMP ";

	$valueArray = array(
			':user_email'=>$user_email,
			':authtoken'=>$authtoken);

	$db = Database::getInstance()->getConnection();
	$query = $db->prepare($sql);
	$query->execute($valueArray);
	$query->setFetchMode(PDO::FETCH_ASSOC);

	$result = $query->fetch();

	if($result['authtoken']==$authtoken){
		return true;
	}
	return false;
}

function updateForgotPasswordStatus($user_email){
	$sql="update forgotpassword set resetstatus='completed' " .
			" where user_email=:user_email";
	$valueArray = array(
			':user_email'=>$user_email);
	return dbUpdate($sql, $valueArray, false);
}
function updateTreatment($treatment_id,$treatment_date,$treatment_description){
	$sql="UPDATE `treatment` SET `treatment_startdate`=:treatment_date,`treatment_description`=:treatment_description WHERE `treatment_id`=:tid";
	$valueArray=array(
		':treatment_date'=>$treatment_date,
		':treatment_description'=>$treatment_description,
		':tid'=>$treatment_id
		);
	$tdelete=dbUpdate($sql,$valueArray,false);
	if($tdelete){
		return true;
	}else{
		return false;
	}
}
function addTreatment($icd_code,$patient_id,$doctor_id,$treatment_date,$treatment_description){

	$sql="INSERT INTO treatment(icd_code,patient_id,doctor_id,treatment_startdate,treatment_description)values(".
	":icd_code,:patient_id,:doctor_id,:treatment_date,:treatment_description)";
	$valueArray=array(
		':icd_code'=>$icd_code,
		':patient_id'=>$patient_id,
		':doctor_id'=>$doctor_id,
		':treatment_date'=>$treatment_date,
		':treatment_description'=>$treatment_description
		);
	$treatment=dbInsert($sql,$valueArray,true);
	if($treatment){
		return true;
	}else{
		return false;
	}
}

function updateStaff($first_name,$last_name,$gender,$dob,$age,$qualification,$mobile_no,$staff_role,$email,$address1,$address2,$address3,$country,$state,$city,$pincode){
	$sql="update staff s,address a set  s.first_name=:fname,s.last_name=:lname,s.gender=:gender,s.dob=:dob,s.age=:age,".	"s.qualification=:qualification,s.mobile_no=:mobile_no,s.staff_role_id=:staff_role_id,".
	"s.email=:email_id,a.address1=:address1,a.address2=:address2,".
	"a.address3=:address3,a.country=:country,a.state=:state,a.city=:city,a.pincode=:pincode where s.staff_id=:id and s.address_id=a.address_id";
	$valueArray = array(
			':fname'=>$first_name,
			':lname'=>$last_name,
			':gender'=>$gender,
			':dob'=>reverse_date($dob),
			':age'=>$age,
			':qualification'=>$qualification,
			':mobile_no'=>$mobile_no,
			':staff_role_id'=>$staff_role,
			':email_id'=>$email,
			':id'=>$_SESSION['staff_id'],
			':address1'=>$address1,
			':address2'=>$address2,
			':address3'=>$address3,
			':country'=>$country,
			':state'=>$state,
			':city'=>$city,
			':pincode'=>$pincode
			);
		$staff_edit=dbUpdate($sql, $valueArray, false);
		if($staff_edit){
			return true;
		}else{
		return false;
	}
}


function userExists($username){

	$sql="select username  from users " .
				" where username=:uid " ;

	$valueArray = array(':uid'=>$username);

	$db = Database::getInstance()->getConnection();
	$query = $db->prepare($sql);
	$query->execute($valueArray);
	$query->setFetchMode(PDO::FETCH_ASSOC);

	$result = $query->fetch();


	if($result['username']==null){
		return false;
	}

	//user exists
	return true;

}

function changePassword($username, $oldPwd, $newPwd){
	//echo "running...dao ";
	global $psalt;
	$oldPwd=$psalt.$oldPwd;
	$newPwd=$psalt.$newPwd;
	$sql="update users set `password`=password(:newPwd) where username=:username and `password`=password(:oldPwd)";
	$valueArray=array(':username'=>$username, ':oldPwd'=>$oldPwd, ':newPwd'=>$newPwd);
	$rowsAffected=dbUpdate($sql, $valueArray, false);
	return $rowsAffected;
}

function resetPwd($username,$pwd='poshan@123'){
	//$type = "cappuccino"
	//echo "running...dao ";
	global $psalt;
	//$pwd='poshan@123';
	$pwd=$psalt.$pwd;
	//$sql="update user set pwd=password('pass@123') where username=:username";
	$sql="update users set password=password(:resetPwd) where username=:username ";
	$valueArray=array(':username'=>$username,'resetPwd'=>$pwd);
	$rowsAffected=dbUpdate($sql, $valueArray);
	return $rowsAffected;
}

function checkLogin($uid,$password,&$status)
{

	global $psalt;
	$pwd=$psalt.$password;

	$sql="select username, password as pwd,role,status,password(:tpwd) as cpwd " .
				"  from user " .
				" where username=:uid " ;

	$valueArray = array(':uid'=>$uid, ':tpwd'=>$password);

	$db = Database::getInstance()->getConnection();
	$query = $db->prepare($sql);
	$query->execute($valueArray);
	$query->setFetchMode(PDO::FETCH_ASSOC);

	$result = $query->fetch();


	if($result['username']==null){
		//userid does not exists@
		$status="Incorrect Username/Password!";
		return false;
	}
	else
	{

		if(strcmp($result['status'], "active")==0)
		{
			//do nothing;
		}
		else
		{
			$status="User not activated!";
			return false;
		}

		if(strcmp($result['cpwd'], $result['pwd'])==0)
		{
			//UPDATING SESSIONS
			$_SESSION['username']=$result['username'];
			$_SESSION['role']=$result['role'];
			$_SESSION['block']=$result['block'];
			$_SESSION['entity']=$result['entity'];
			//login insert and  gat last login details
			$lastlogin=getLastLoginLog($_SESSION['username']);
			$_SESSION['lastlogdetails']=$lastlogin['dtstamp'];
			runLoginLog($_SESSION['username']);
			return true;
		}
		else
		{
			//$status="incorrect password! " ;
			$status="Incorrect Username/Password!" ;
			//. $result['cpwd'] ."/" . $result['pwd'];
			return false;
		}

	}

}


function activateUser($username, $option){
	//echo "running...dao ";
	$status=($option==true)?"active":"inactive";
	//$sql="update user set pwd=password('pass@123') where username=:username";
	$sql="update users set status=:choice where username=:username ";
	$valueArray=array(':username'=>$username,'choice'=>$status);
	$rowsAffected=dbUpdate($sql, $valueArray);
	return $rowsAffected;
}

function addstaffrole($staff_role,$description){

	$sql="INSERT into staff_role(`staff_role`,`description`)VALUES(:staff_role,:description)";
	$valueArray=array(

			':staff_role'=>$staff_role,
			':description'=>$description

		);
	$staff_role=dbInsert($sql, $valueArray, true);


	//default password
	// resetPwd($username);
	if($staff_role){
		return true;
	}else{
		return false;
	}

}
 function updatestaffrole($staff_edit,$staff_role,$description){

$sql="UPDATE staff_role SET `staff_role`=:staff_role,`description`=:description WHERE staff_role_id=:id";

$valueArray=array(
	':staff_role'=>$staff_role,
	':description'=>$description,

	':id'=>$staff_edit);

$staffupdate=dbUpdate($sql,$valueArray,false);


// resetPwd($username);
	if($staffupdate){
		return true;
	}else{
		return false;
	}

 }

?>
