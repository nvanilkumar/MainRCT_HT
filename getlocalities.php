<?php
require_once('main.inc.php');

function getLocalitiesByVid($vill_name)
{       
	$result = db_query("Select distinct(locality) from cvd_basetable where locality is not null and vill_name ='".$vill_name."' order by locality asc;");
//         echo "Select distinct(locality) from cvd_basetable where locality is not null and vill_name ='".$vill_name."' order by locality asc;";
	if($result && db_num_rows($result)){
		$data=' <option value="">Select</option>';
		while ($locality = db_fetch_row($result)) 
		{	
			$data.="<option>".$locality[0]."</option>";
		}	
		return rtrim($data);
	}	
}
 
if (isset($_GET['villname'])) {
     
    echo getLocalitiesByVid($_GET['villname']);
    
}
