<?php
include "config.php";

$db = dbConnect();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if($_GET['ch'] != NULL)
{
	
	echo '<select name="umandal" id="umandal" onchange="dynamic_SelectMandal(\'mandal2village.php\',this.value)">';
	
	$rows = mysql_query("SELECT DISTINCT mname FROM locations_list WHERE dname= '".$_GET['ch']."' ",$db);
	
	if(mysql_num_rows($rows)>0)
	{
		while($result = mysql_fetch_array($rows,MYSQL_ASSOC))
		{
			echo "<option value='".$result['mname']."'>".$result['mname']."</option>";
		}
	}
	
	echo "</select>";
	
}

?>

		
	