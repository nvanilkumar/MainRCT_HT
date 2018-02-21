<?php
require_once('main.inc.php');

function getPSU($psu)
{			
	$result = db_query('Select count(*),Date(enc_date) from cvd_basetable where psu="'.$psu.'" group by Date(enc_date) order by id ASC');
	
	if($result && db_num_rows($result))	{
		$data='';
		while (list($count,$date) = db_fetch_row($result)) 
		{	
			$data.=$date.','.$count.'#';		
		}	
		return rtrim($data,'#');
	}
	else
	{
		return 'false';
	}
}
if(isset($_GET['psu']))
	echo getPSU($_GET['psu']);
?>