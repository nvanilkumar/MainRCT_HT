<?php
require_once('main.inc.php');

function getLocalitiesByPSU($psu_id)
{        
//	$result = db_query("Select distinct(locality) from cvd_basetable where locality is not null and vill_name ='".$vill_name."' order by locality asc;");
        $result = db_query('Select distinct(vill_name) from cvd_basetable where vill_name is not null and psu ="'.$psu_id.'" order by asha_assigned asc;');
      
	if($result && db_num_rows($result)){
		$data='<option value="">Select</option>';
		while ($locality = db_fetch_row($result)) 
		{	
			$data.="<option>".$locality[0]."</option>";
		}	
		return rtrim($data);
	}	
}
 
if (isset($_GET['psuId'])) {
    echo getLocalitiesByPSU($_GET['psuId']);
    
}
