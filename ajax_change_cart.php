<?php 
include("connect.php");


$id 		= $db->clean($_POST['id']);
$quntity 	= $db->clean($_POST['quntity']);
$period 	= $db->clean($_POST['period']);

if($quntity < 0 || $quntity == 0)
{
	echo json_encode("change quntity");
	exit();
}
else
{
	if($id != "" && $quntity != "" && $period != "")
	{
		if($period == "month")
		{
			if($quntity <= 5000 )
			{
				$rows = array(
					"quntity"	=> $quntity,
					"total"		=> 55,
					"period"	=> "month"
				);
			}
			elseif($quntity <= 10000) {
				$rows = array(
					"quntity"	=> $quntity,
					"total"		=> 69,
					"period"	=> "month"
				);
			}
			elseif($quntity <= 50000) {
				$rows = array(
					"quntity"	=> $quntity,
					"total"		=> 92,
					"period"	=> "month"
				);
			}
			elseif ($quntity <= 100000) {
				$rows = array(
					"quntity"	=> $quntity,
					"total"		=> 155,
					"period"	=> "month"
				);
			}
			else
			{
				$rows = array();
			}
			$where = " label_id=".$id." AND user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND isDelete = 0 ";
		}
		else
		{
			if($quntity <= 5000 )
			{
				$rows = array(
					"quntity"	=> $quntity,
					"total"		=> 600,
					"period"	=> "year"
				);
			}
			elseif($quntity <= 10000) {
				$rows = array(
					"quntity"	=> $quntity,
					"total"		=> 750,
					"period"	=> "year"
				);
			}
			elseif($quntity <= 50000) {
				$rows = array(
					"quntity"	=> $quntity,
					"total"		=> 1000,
					"period"	=> "year"
				);
			}
			elseif ($quntity <= 100000) {
				$rows = array(
					"quntity"	=> $quntity,
					"total"		=> 1700,
					"period"	=> "year"
				);
			}
			else
			{
				$rows = array();
			}

			$where = " label_id=".$id." AND user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND isDelete = 0 ";
		}
		
		$db->rpupdate("cart_detail",$rows,$where);

		$res = $db->ChangeCart();
		if($res == true)
		{
			echo json_encode(true);
			exit();
		}
		else
		{
			echo json_encode(false);
			exit();
		}
	}
	else
	{
		echo json_encode(false);
		exit();
	}	
}


?>