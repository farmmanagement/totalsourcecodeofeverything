<?php
include "config.php";

$db = dbConnect();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_GET['ch'] == 'AP') {
	
	echo '<select name="udistrict" id="udistrict" onchange="dynamic_SelectDistrict(\'district2mandal.php\',this.value)">';
	
	$rows = mysql_query("SELECT DISTINCT dname FROM locations_list",$db);
	
	if(mysql_num_rows($rows)>0)
	{
		while($result = mysql_fetch_array($rows,MYSQL_ASSOC))
		{
			echo "<option value='".$result['dname']."'>".$result['dname']."</option>";
		}
	}
	
	echo "</select>";
	
}

?>

		
	