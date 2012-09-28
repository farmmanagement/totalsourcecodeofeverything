<?php

include "config.php";

		$db = dbConnect();
				
 		function fetchData($db)
 		{
			$rows = mysql_query("SELECT phone FROM farmers_personal_det",$db);
					
			if(mysql_num_rows($rows)>0)
			{
				$data = array();
				while($result = mysql_fetch_array($rows,MYSQL_ASSOC))
				{
					$data[] = $result['phone'];
				}
			}
						
			SendtoAll($data);
		}
		
		
		function SendtoAll($data)
		{
		        $message = "SomeOne called Deepak Jaffa!!!";

			//$message = "Notification System is now Working,atleast temporarily :P ;)";
					
			foreach ($data as $value)
			{
				echo "<br/>"; 
				
				echo file_get_contents("http://s1.freesmsapi.com/messages/send?skey=742c0fbcab69919c439f5a5284dff813&message=".urlencode($message)."&recipient=".$value."");
			
				//echo file_get_contents("http://s1.freesmsapi.com/messages/send?skey=9ecf9756191b886e90759b40abbc1c46&message=".urlencode($message)."&recipient=".$value."");
			
				//echo file_get_contents("http://www.freesmsapi.com/widgets/findmyip");
			
				echo "<br/>"; 
			}
		}
		
		//fetchData($db);
		
		function SendMessage($message,$receiver)
		{
			echo file_get_contents("http://s1.freesmsapi.com/messages/send?skey=742c0fbcab69919c439f5a5284dff813&message=".urlencode($message)."&recipient=".$receiver."");
			
				//echo file_get_contents("http://s1.freesmsapi.com/messages/send?skey=9ecf9756191b886e90759b40abbc1c46&message=".urlencode($message)."&recipient=".$receiver."");
		}
		
		echo file_get_contents("http://www.freesmsapi.com/widgets/findmyip");
?>