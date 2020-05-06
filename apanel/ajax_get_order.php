<?php
include("connect.php");
$ctable     = "cart";
$ctable1    = "order";
$page       = "order";

//for sidebar active menu
if(isset($_REQUEST['searchName']) && $_REQUEST['searchName']!=""){
	$ctable_where .= " (
			label like '%".$_REQUEST['searchName']."%' OR
			upcirc like '%".$_REQUEST['searchName']."%' OR
			downcirc like '%".$_REQUEST['searchName']."%' OR
			height like '%".$_REQUEST['searchName']."%' OR
			weight like '%".$_REQUEST['searchName']."%' OR
	) and";
}

$ctable_where .= " isDelete=0";
$item_per_page =  ($_REQUEST["show"] <> "" && is_numeric($_REQUEST["show"]) ) ? intval($_REQUEST["show"]) : 10;

if(isset($_REQUEST["page"]) && $_REQUEST["page"]!=""){
		$page_number = filter_var($_REQUEST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
		$page_number = 1; //if there's no page number, set it to 1
}

$get_total_rows = $db->rpgetTotalRecord($ctable,$ctable_where); //hold total records in variable

//break records into pages
$total_pages   = ceil($get_total_rows/$item_per_page);

//get starting position to fetch the records
$page_position = (($page_number-1) * $item_per_page);
$pagiArr       = array($item_per_page, $page_number, $get_total_rows, $total_pages);
$ctable_r      = $db->rpgetData($ctable,"*",$ctable_where,"id DESC limit $page_position, $item_per_page");
?>
<style>

.switch-toggle {
	width: 10em;
}
.switch-toggle label:not(.disabled) {
	cursor: pointer;
}

.switch {
	position: relative;
	display: inline-block;
	width: 50px;
	height: 25px;
}

.switch input { 
	opacity: 0;
	width: 0;
	height: 0;
}

.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #ccc;
	-webkit-transition: .4s;
	transition: .4s;
}

.slider:before {
	position: absolute;
	content: "";
	height: 18px;
	width: 18px;
	left: 4px;
	bottom: 4px;
	background-color: white;
	-webkit-transition: .4s;
	transition: .4s;
}

input:checked + .slider {
	background-color: #2196F3;
}

input:focus + .slider {
	box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
	-webkit-transform: translateX(26px);
	-ms-transform: translateX(26px);
	transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
	border-radius: 34px;
}

.slider.round:before {
	border-radius: 50%;
}
</style>
<form action="" name="frm" id="frm" method="post">
		<br>
		<?php
		
		?>
		<table id="example" class="table table-striped table-bordered table-colored table-info">
			<thead>
				<tr>
					<th>No.</th>
					<th>Order No</th>
					<th>User Name</th>
					<th>Grand Total</th>
					<th>Order Status</th>
					<th>Order Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(@mysqli_num_rows($ctable_r)>0){
					$count = 0;
					while($ctable_d = @mysqli_fetch_array($ctable_r))
					{
						$count++;
						if($ctable_d['order_status']==0)
						{
							$order_status='In Progress';
						}
						elseif($ctable_d['order_status']==1)
						{
							$order_status='Complete';
						}
						else
						{
							$order_status='Cancel';
						}
					?>
					<tr>
						<td><?php echo $count+$page_position; ?></td>
						<td><?php if($ctable_d['order_no'] == '0'){ echo "-"; }else{ echo $ctable_d['order_no']; } ?></td>
						<td><?php echo $db->rpgetValue("user","name","id=".$ctable_d['user_id']); ?></td>
						<td><?php echo "€".$ctable_d['grand_total']; ?></td>
						<td><?php echo $order_status; ?></td>
						<td><?php if($ctable_d['order_date'] == NULL){ echo "-"; }else{ echo $db->rpDate1($ctable_d['order_date']);} ?></td>
						<td>
							<!-- <a class="btn btn-xs btn-icon waves-effect waves-light btn-info m-b-5" href="<?php echo ADMINURL?>view-<?=$ctable?>/view/<?php echo $ctable_d['id']; ?>/" title="view"><i class="fa fa-eye"></i></a> -->
										 
							<a class="btn btn-xs btn-icon waves-effect waves-light btn-primary m-b-5" href="<?php echo ADMINURL?>add-order/edit/<?php echo $ctable_d['id']; ?>/" title="Edit"><i class="fa fa-pencil"></i></a>
					
							<a class="btn btn-xs btn-icon waves-effect waves-light btn-danger m-b-5" onClick="del_conf('<?php echo $ctable_d['id']; ?>');" title="Delete"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php
					}
				}
				?>
			</tbody>
		</table>
		<?php 
			$db->rpgetTablePaginationBlock($pagiArr);
		?>
</br>
</form>
<script type="text/javascript" async>
function approve(id)
{
	$.ajax({
		type: "POST",
		url: "<?php echo ADMINURL ?>ajax_user_status_update.php",
		data: {id:id},
		dataType: "json",
		success: function(response){}
	});
}

function status(id)
{
	$.ajax({
		type: "POST",
		url: "<?php echo ADMINURL ?>ajax_status_update.php",
		data: {id:id},
		dataType: "json",
		success: function(response){}
	});
}
</script>