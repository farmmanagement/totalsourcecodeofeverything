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
	$tab1 = mysql_query("SELECT farmer_id,seed_id,sown_date FROM farmer_crop_details",$db);
	while($result1 = mysql_fetch_array($tab1,MYSQL_ASSOC))
	{
		$sid = $result1['seed_id'];
		$fid = $result1['farmer_id'];
		$sowndate = $result1['sown_date'];
		
		$date_diff = find_days_diff($sowndate,getCurrentdate());
		
	    if($date_diff != -1)
	    {
		$tab2 = mysql_query("SELECT * FROM seed_data WHERE seed_id='".$sid."' AND ((dayfrom>=".mysql_real_escape_string($date_diff)." AND dayto<=".mysql_real_escape_string($date_diff+1).") OR (dayfrom>=".mysql_real_escape_string($date_diff-1)." AND dayto<=".mysql_real_escape_string($date_diff).")) ",$db);
		if(mysql_num_rows($tab2)>0)
		{
			$result2 = mysql_fetch_array($tab2,MYSQL_ASSOC);
			$procedure = $result2['procedure'];
				
			$tab3 = mysql_query("SELECT mobile FROM farmers_personal_det WHERE fid='".$fid."'",$db);
			$result3 = mysql_fetch_array($tab3,MYSQL_ASSOC);
			$mobile = $result3['mobile'];
				
			$msg = $fid.",".$sid.","."Sown on: ".$sowndate.","."Days passed: ".$date_diff.","."Today's process: ".$procedure.";";
			SendMessage($msg,$mobile);
			//print_r($fid.",".$sid.",".$sowndate.",".$date_diff.",".$mobile.",".$procedure.";");
			//echo "<br/>".$fid.",".$sid.",".$sowndate.",".$date_diff.",".$mobile.",".$procedure.";"."<br/>";
		}
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
	check_users($db);
	
?>