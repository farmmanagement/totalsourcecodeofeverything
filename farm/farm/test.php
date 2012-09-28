<?php

include "config.php";

$db = dbConnect();

 function json($data)
 {
	if(is_array($data)){
		return json_encode($data);
	}
}
 function usersearch($db)
		{
			
			
			$uid = "AP072606";
			
						
			
			$rows = mysql_query("SELECT fname,tlc FROM farmers_personal_det WHERE fid LIKE '".$uid.__."' ",$db);
			
			if(mysql_num_rows($rows) == 0)
			{
				$data = array("status" => "No Users");
				
			}
			else
			{	
				$i=0;
				while($result = mysql_fetch_array($rows,MYSQL_ASSOC))
				{	
					$data[$i][] = $result['fname'];
					$data[$i][] = $result['tlc'];
					$i++;
				}
					
				
			}
			print_r(json($data));
			
			
			
			
													
		}

 usersearch($db);


?>