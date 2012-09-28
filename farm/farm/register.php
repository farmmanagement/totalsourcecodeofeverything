<?php
include ("config.php");

$db = dbConnect();
$user['fname'] = $_POST['fname'];
$user['email'] = $_POST['mail'];
$user['pwd'] = $_POST['pwd'];
$user['dob'] = $_POST['dob'];
$user['gender'] = $_POST['gender'];
$user['address'] = $_POST['address'];
$user['mobile'] = $_POST['mobile'];
$user['phone'] = $_POST['phone'];
$user['edu'] = $_POST['edu'];
$user['exp'] = $_POST['exp'];
$user['tlc'] = $_POST['tlc'];
$user['ustate'] = $_POST['ustate'];
$user['udistrict'] = $_POST['udistrict'];
$user['umandal'] = $_POST['umandal'];
$user['uvillage'] = $_POST['uvillage'];
$user['seed'] = $_POST['seed'];
$user['sdate'] = $_POST['sdate'];
$user['snums'] = $_POST['snums'];
$user['snume'] = $_POST['snume'];
$user['clatlong'] = $_POST['clatlong'];
$user['fid'] = uid_generate($db,$user['ustate'],$user['udistrict'],$user['umandal'],$user['uvillage']);


function uid_generate($db,$ustate,$udistrict,$umandal,$uvillage)
{	
	//append state to uid
	$uid = $ustate;
	
	//append district code to uid
	$rows = mysql_query("SELECT DISTINCT dcode FROM locations_list WHERE dname= '".$udistrict."'",$db);
		
	if(mysql_num_rows($rows)>0)
		$result = mysql_fetch_array($rows,MYSQL_ASSOC);
		
	$uid .=  $result['dcode'];
	
	//append mandal code to uid
	$rows = mysql_query("SELECT DISTINCT mcode FROM locations_list WHERE mname= '".$umandal."'",$db);
	
	if(mysql_num_rows($rows)>0)
		$result = mysql_fetch_array($rows,MYSQL_ASSOC);
		
	$uid .= $result['mcode'];
	
	//append village code to uid
	$rows = mysql_query("SELECT vcode FROM locations_list WHERE vname= '".$uvillage."'",$db);
	
	if(mysql_num_rows($rows)>0)
		$result = mysql_fetch_array($rows,MYSQL_ASSOC);
		
	$temp = converttobase36($result['vcode']);
	
	$uid .= $temp;
	
	//append serial number to uid	
	$rows = mysql_query("SELECT fid FROM farmers_personal_det WHERE fid LIKE '".$uid.__."' ",$db);
	
	if($rows != NULL)		
		$sno = (mysql_num_rows($rows)+1);
	else
		$sno = 1;
	
	$temp = converttobase36($sno);	
	$uid .= $temp;
	
	return $uid;

}

//little endian system
function converttobase36($value)
{
	$base = 36;
	while($value != 0)
	{
		$rem = ($value % $base);
		
		if($rem > 9)
			$result = chr(55 + $rem);
		else
			$result .= $rem;
		
		$value = (int)($value / $base);
	}
	
	if(strlen($result) == 1)
		$result .= '0';
	
	return strrev($result);
}

function generate_uid($length)
 {	

    $characters = "0123456789abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM";
    $string ='';    
    for ($p = 0; $p < $length; $p++) {
	$string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}
		
$sql = mysql_query("INSERT INTO `farmers_personal_det`(`fid` ,`fname`, `email`, `pwd`,`dob` ,`gender` ,`address` ,`mobile` ,`phone` ,`edu` ,`exp` ,`tlc`,`regdate`) VALUES (  '".$user['fid']."',  '".$user['fname']."', '".$user['email']."' , '".$user['pwd']."' , '".$user['dob']."' ,  '".$user['gender']."' ,  '".$user['address']."' ,  '".$user['mobile']."' ,  '".$user['phone']."' ,  '".$user['edu']."' ,  '".$user['exp']."',  '".$user['tlc']."' , CURRENT_TIMESTAMP);",$db);

$sql = mysql_query("INSERT INTO `farmer_crop_details` (`farmer_id`,`land_owned`,`seed_id`,`sown_date`,`survey_start`,`survey_end`,`latlong_centre`) VALUES ('".$user['fid']."', '".$user['tlc']."', '".$user['seed']."', '".$user['sdate']."', '".$user['snums']."', '".$user['snume']."', '".$user['clatlong']."');",$db);

print_r("<br/>"."Successfully inserted into db!!!");
print_r("<br/>"."Your ID is :".$user['fid']);



?>