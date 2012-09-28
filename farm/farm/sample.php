<?php
include "config.php";

$db = dbConnect();

function SendMessage($message,$receiver)
{
			echo file_get_contents("http://s1.freesmsapi.com/messages/send?skey=742c0fbcab69919c439f5a5284dff813&message=".urlencode($message)."&recipient=".$receiver."");
			
				//echo file_get_contents("http://s1.freesmsapi.com/messages/send?skey=9ecf9756191b886e90759b40abbc1c46&message=".urlencode($message)."&recipient=".$receiver."");
}
	
function check_users($db)
{
	$tab1 = mysql_query("SELECT * FROM farmer_crop_details",$db);
	while($result1 = mysql_fetch_array($tab1,MYSQL_ASSOC))
	{
		$sid = $result1['seed_id'];
		$fid = $result1['farmer_id'];
		$sowndate = $result1['sown_date'];
		
		$date_diff = find_days_diff($sowndate,getCurrentdate());
		
		$tab2 = mysql_query("SELECT * FROM seed_data WHERE seed_id='".$sid."' AND ((dayfrom>=".mysql_real_escape_string($date_diff)." AND dayto<=".mysql_real_escape_string($date_diff+1).") OR (dayfrom>=".mysql_real_escape_string($date_diff-1)." AND dayto<=".mysql_real_escape_string($date_diff).")) ",$db);
		if(mysql_num_rows($tab2)>0)
		{
			$result2 = mysql_fetch_array($tab2,MYSQL_ASSOC);
			$procedure = $result2['procedure'];
				
			$tab3 = mysql_query("SELECT mobile FROM farmers_personal_det WHERE fid='".$fid."'",$db);
			$result3 = mysql_fetch_array($tab3,MYSQL_ASSOC);
			$mobile = $result3['mobile'];
				
			//SendMessage($procedure,$mobile);
			//print_r($fid.",".$sid.",".$sowndate.",".$date_diff.",".$mobile.",".$procedure.";");
			//echo "<br/>".$fid.",".$sid.",".$sowndate.",".$date_diff.",".$mobile.",".$procedure.";"."<br/>";
			$msg = $fid.",".$sid.","."Sown on: ".$sowndate.","."Days passed: ".$date_diff.",".$mobile.",".$procedure.";";
			echo "<br/>".$msg."<br/>";
		}
	}
}

function getCurrentdate()
{
	date_default_timezone_set('Asia/Calcutta');
	return date("Y-m-d",time());
}

function find_days_diff($source,$target)
{
	if($source < $target)
	{
		$source = strtotime($source,0);
		$target = strtotime($target,0);
	
		return floor((($target - $source)/86400)+1);
	}
	else
		return -1;	
}

function convert_date_format($date)
{
	$day = substr($date,0,2);
	$month = substr($date,3,2);
	$year = substr($date,6,4);
	
	return $year."-".$month."-".$day;
}
	
	check_users($db);
	
	
	//$var = 2;
	//echo "SELECT * FROM seed_data WHERE seed_id=\"COTTON\" AND (dayfrom>=".mysql_real_escape_string($var)." AND dayto<=".mysql_real_escape_string($var).") AND (dayfrom>=".mysql_real_escape_string($var)." AND dayto<=".mysql_real_escape_string($var).")";
	
	//date_default_timezone_set('Asia/Calcutta');
	//echo date("Y-m-d h:i:s a",time());
	//echo "SELECT * FROM seed_data WHERE seed_id='".$sid."' AND ((dayfrom>=".mysql_real_escape_string($date_diff)." AND dayto<=".mysql_real_escape_string($date_diff+1).") OR (dayfrom>=".mysql_real_escape_string($date_diff-1)." AND dayto<=".mysql_real_escape_string($date_diff).")) ";
	
	//echo find_days_diff("2012-10-20","2012-10-15");
	
	//echo convert_date_format("20-10-2012");
?>