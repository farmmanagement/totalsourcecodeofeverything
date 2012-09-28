<?php
include "config.php";

$db = dbConnect();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if($_GET['ch'] != NULL)
{
	
	echo '<select name="uvillage" id="uvillage">';
	
	$rows = mysql_query("SELECT vname FROM locations_list WHERE mname= '".$_GET['ch']."' ",$db);
	
	if(mysql_num_rows($rows)>0)
	{
		while($result = mysql_fetch_array($rows,MYSQL_ASSOC))
		{
			echo "<option value='".$result['vname']."'>".$result['vname']."</option>";
		}
	}
	
	echo "</select>";
	
}

?>

		
	