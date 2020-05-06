<?php 
include("connect.php");

$id = $db->clean($_POST['id']);

if($id!="")
{
	$get_data = $db->rpgetData("labels",'*'," labels_id = '".$id."' ");

	if(@mysqli_num_rows($get_data) > 0)
	{
		while($get_data_d = @mysqli_fetch_array($get_data))
		{
		 	echo json_encode($results = $get_data_d);
		}
	}
	else
	{
		echo json_encode(false);
	}
}
else
{
	echo json_encode(false);
}

?>